<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use LastFmApi\Api\AuthApi;
use LastFmApi\Api\TrackApi;
use LastFmApi\Api\UserApi;
use App\Entity\Album;

class LastfmController extends AbstractController {

    const AUTH_URL = 'http://www.last.fm/api/auth/';

    private TrackApi $trackApi;
    private RequestStack $requestStack;
    private string $token;
    private AuthApi $auth;
    private string $callback;
    private array $settings;
    private DeezerController $dz;

    // private array $params;
    //   private DeezerC $dz;

    public function __construct(DeezerController $dz, ParameterBagInterface $settings, RequestStack $requestStack) {
        $this->dz = $dz;
        $this->requestStack = $requestStack;
        $this->baseUrl = $settings->get("baseurl");
        $this->callback = $this->baseUrl . "lastfm/connect";
        $this->settings = $settings->get("lastfm");
    }

    private function link($href) {
        echo "<a href='" . $href . "'>link</a><br>";
    }

    private function getSession(string $token, array $params): Response {
        $params['token'] = $token;
        $auth = new AuthApi('getsession', $params);
        $href = $this->callback . '?session=' . $auth->sessionKey . '&username=' . $auth->username . '&subscriber=' . $auth->subscriber;
        return $this->render('lastfm/getsession.html.twig', ['getsession' => $href]);
    }

    private function getToken($session, array $params): Response {
        $session->set('state', md5(uniqid(rand(), TRUE))); //CSRF protection
        $obj = new AuthApi('gettoken', $params);
        $dialog_url = self::AUTH_URL . '?api_key=' . $params['apiKey'] . '&token=' . $obj->token . "&cb=" . urlencode($this->callback);
        $url = $this->callback . '?token=' . $obj->token;
        return $this->render('lastfm/token.html.twig', ['url' => $dialog_url, 'url2' => $url]);
    }

    #[Route('/lastfm/connect', name: 'lastfm_connect')]
    public function connect(): Response {
        $request = Request::createFromGlobals();
        $session = $this->requestStack->getSession();
        $params = $this->settings;

        $session->set('session', $params['sessionKey']);
        if (!empty($request->query->get("token"))) {
            $this->getSession($request->query->get("token"), $params);
        }

        if ($session->get('session') == null || empty($session->get('session'))) {
            $this->getToken($session, $params);
        } else {
            $this->auth = new AuthApi('setsession', $params);
            $this->trackApi = new TrackApi($this->auth);
            $album = new Album();

            $form = $this->createFormBuilder($album)
                    ->setAction($this->generateUrl('lastfm_scrobble'))
                    ->add('id', TextType::class, ['label' => 'ID:'])
                    ->add('saveAndAdd', ButtonType::class, ['label' => 'Load album'])
                    ->add('title', TextType::class, ['label' => 'Title:'])
                    ->add('artist', TextType::class, ['label' => 'Artist:'])
                    ->add('range', TextType::class, ['label' => 'Range:'])
                    ->add('save', SubmitType::class, ['label' => 'Scrobble album'])
                    ->getForm();

            //               print_r($this->trackApi);exit;
            return $this->render('lastfm/connect.html.twig', ['form' => $form]);
        }
    }
    #[Route('/lastfm/scrobble', name: 'lastfm_scrobble')]
    public function scrobble(Request $request):JsonResponse {
         $params = $this->settings;
         $this->auth = new AuthApi('setsession', $params);
        $data = $request->request->all("form");
        $id = $data['id'];
        $params['artist'] = $data['artist'];
        $params['album'] = $data['title'];
        $range = $data['range'];
     //   $index = $data['index'];
        $this->trackApi = new TrackApi($this->auth);
        //echo $params['artist'] . " - " . $params['album'] . "<br>";
        $scrobbled=$this->dz->scrobbleTracks($this->trackApi, $id, $params, $range);
        return new JsonResponse($scrobbled);
    }

    #[Route('/lastfm/recent', name: 'lastfm_recent')]
    public function recent(): Response {
        $params = $this->settings;
        $params['sessionKey'] = $params['sessionKey'];
        $params['username'] = $params['username'];
        $params['subscriber'] = $params['subscriber'];
        $this->auth = new AuthApi('setsession', $params);

        $api = new UserApi($this->auth);
        $data = $api->getRecentTracks(['user' => 'aeeon3']);
        return $this->render('lastfm/recent.html.twig', ['data' => $data]);
    }

}
