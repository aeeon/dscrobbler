<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use PouleR\DeezerAPI\DeezerAPIClient;
use App\Lib\CustomDeezerApi as DeezerAPI;
use Symfony\Component\HttpFoundation\RequestStack;
use LastFmApi\Exception\ApiFailedException;
use Symfony\Component\HttpClient\Exception\ClientException;
use LastFmApi\Exception\NotAuthenticatedException;

class DeezerController extends AbstractController {

    private array $settings;
    private string $callback;
    private string $deezerKey;
    private string $baseUrl;
    private DeezerAPI $api;
    private CurlHttpClient $curl;
    private DeezerAPIClient $client;
    private RequestStack $requestStack;

    const AUTH_URL = "https://connect.deezer.com/oauth/auth.php?app_id=";
    const TOKEN_URL = "https://connect.deezer.com/oauth/access_token.php?app_id=";

    public function __construct(ParameterBagInterface $settings, RequestStack $requestStack) {
        $this->requestStack = $requestStack;
        $this->settings = $settings->get("deezer");
        $this->baseUrl = $settings->get("baseurl");
        $this->callback = $this->baseUrl . "deezer/connect";
        $this->curl = new CurlHttpClient();
        $this->client = new DeezerAPIClient($this->curl);
    }

    #[Route('/deezer/connect', name: 'deezer_connect')]
    public function index() {
        $request = Request::createFromGlobals();
        $session = $this->requestStack->getSession();
        $code = $request->query->get("code");
        if (!empty($code)) {
            $token_url = self::TOKEN_URL
                    . $this->settings["appid"] . "&secret="
                    . $this->settings["secret"] . "&code=" . $code;

            $response = file_get_contents($token_url);
            $params = null;
            parse_str($response, $params);

            $session->set('access_token', $params['access_token']);

            $this->connect($session);
            return $this->render('deezer/connect.html.twig');
            // $this->getUserHistory();
            //  header("Location: " . $this->baseUrl);
            //  exit;
        }

        if ($session->get('access_token') == null || empty($session->get('access_token'))) {
            $session->set('state', md5(uniqid(rand(), TRUE))); //CSRF protection

            $dialog_url = self::AUTH_URL . $this->settings["appid"]
                    . "&redirect_uri=" . urlencode($this->callback) . "&perms=listening_history,email,offline_access"
                    . "&state=" . $session->get('state');

            header("Location: " . $dialog_url);
            exit;
        }

        return $this->render('deezer/connect.html.twig');
    }

    public function connect($session) {
        if ($session->get('access_token') === null) {
            $this->index();
        } else {
            $this->deezerKey = $session->get('access_token');
            $this->client->setAccessToken($this->deezerKey);
            $this->api = new DeezerAPI($this->client);
        }
    }

    #[Route('/deezer/load', name: 'deezer_load')]
    public function loadAlbum(Request $request): JsonResponse {
        $id = $request->request->get("id");
        if (is_numeric($id)) {
            $album = $this->getAlbum($id);
            //   $form = $this->createForm(AlbumType::class, $album);
            //  $form->handleRequest($request);
            //  $data = $form->getData();
            $data = ['title' => $album->title, 'artist' => $album->artist->name];
            return new JsonResponse($data);
        } else {
            return new JsonResponse(['error' => "error"]);
        }
    }

    #[Route('/deezer/logout', name: 'deezer_logout')]
    public function logout(): Response {
        $session = $this->requestStack->getSession();
        $session->remove('access_token');
        return $this->render('deezer/logout.html.twig');
    }

    public function getUserInformation($session) {
        $this->connect($session);
        print_r($this->api->getUserInformation());
        exit;
    }

    public function getAlbum($id) {
        $session = $this->requestStack->getSession();
        $this->connect($session);
        $album = $this->api->getAlbum($id);
        return $album;
    }

    #[Route('/deezer/history', name: 'deezer_history')]
    public function getUserHistory(): Response {
        $session = $this->requestStack->getSession();
        $this->connect($session);

        $tracks = $this->api->getUserHistory();
        return $this->render('deezer/history.html.twig', ['data' => $tracks->data]);
    }

    private function calculateIndex(int $val): int {
        return floor(($val - 1) / 25) * 25;
    }

    /* deezer album tracks have pages, every page has 25 tracks, this function return indexes for every page thas is necessary, 
     * for example if album has 100 tracks it has 4 pages, in this case function will return 4 indexes: 25, 50, 75 and 100
     */

    private function getIndexes(int $begin, int $end): array {
        $indexes = [];
        $first = $this->calculateIndex($begin);
        $last = $this->calculateIndex($end);

        for ($i = $first; $i <= $last; $i += 25) {
            $indexes[] = $i;
        }
        return $indexes;
    }

    public function scrobbleTracks($trackApi, int $id, array $params, string $range): array {
        $session = $this->requestStack->getSession();
        $this->connect($session);
        $arr = [];
        $begin = 0;
        $end = 0;
        $indexes = [];
        $tracks_arr = [];
        $pos = array();
        // $regex1="/^[0-9,]+$/";
        $regex1 = "/^(|((\d+)(,\d+)+))$/";
        $regex2 = "/^((\d+-(\*|\d+))|((\*|\d+)-\d+))$/";
        if (preg_match($regex1, $range)) { // numbers separated by commas
            $arr = explode(",", $range);
            sort($arr, SORT_NUMERIC);
            $j = 0;
            $indexes = $this->getIndexes($arr[0], $arr[count($arr) - 1]);
            foreach ($arr as $el) {
                $pos[] = (int) ($el - $indexes[0]);
                $j++;
            }
        } else if (preg_match($regex2, $range)) { // if $range contain actual numbers range
            $arr = explode("-", $range);
            $indexes = $this->getIndexes($arr[0], $arr[1]);
            $begin = (int) ($arr[0] - $indexes[0]);
            $end = (int) ($arr[1] - $indexes[0]);
        } else { // if range contain just single number
            $indexes[] = $this->calculateIndex((int) $range);
            $begin = (int) ($range - $indexes[0]);
        }

        // we go trough all album pages and save them all in seperate  array

        foreach ($indexes as $index) {

            $tracks_arr[] = $this->api->getAlbumTracks($id, $index)->data;
        }
        $scrobbled = $this->scrobbleIndexTracks($trackApi, $tracks_arr, $params, $begin, $end, $pos);
        return $scrobbled;
    }

    private function scrobbleIndexTracks($trackApi, $tracks_arr, $params, $begin, $end, $pos = array()) : array {
        $scrobbled = [];
        $i = 1;
        $multiple = false;
        if ($end === 0 && $begin === 0 && !empty($pos)) {
            $multiple = true;
        }
        foreach ($tracks_arr as $tracks) {
            foreach ($tracks as $track) {
                $i++;
                if ($multiple) {
                    if (!in_array($i - 1, $pos)) continue;
                } else {
                    if ($end === 0 && ($i - 1) !== $begin) 
                        continue;
                    else if ($end !== 0 && ($i - 1 < $begin || $i - 1 > $end))
                        continue;   
                }
                $scrobbled[] = $this->scrobble($track, $trackApi, $params);
            }
        }
        return $scrobbled;
    }

    private function scrobble($track, $trackApi, $params):array {
        $scrobbled = [];
        //$skipped=[];
        $params['track'] = $track->title;
        $params['timestamp'] = time();
        try {
            $trackApi->scrobble($params);
            $scrobbled[] = $params['track'];
        } catch (ApiFailedException $ex) {
            return ['error' => $ex->getMessage()];
        } catch (NotAuthenticatedException $ex) {
            return ['error' => $ex->getMessage()];
        } catch (ClientException $ex) {
            return ['error' => $ex->getMessage()];
        }
        return $scrobbled;
    }

}
