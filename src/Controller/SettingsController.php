<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Yaml\Yaml;

class SettingsController extends AbstractController {

    private string $baseUrl;
    private array $settings;
    private string $callback;
    private CurlHttpClient $curl;
    private RequestStack $requestStack;

    const CONF_FILE = __DIR__ . '/../../config/services.yaml';

    public function __construct(ParameterBagInterface $settings, RequestStack $requestStack) {
        $this->requestStack = $requestStack;
        $this->baseUrl = $settings->get("baseurl");
        $this->settings = $settings->get("deezer");
        $this->callback = $settings->get("baseurl");
        $this->curl = new CurlHttpClient();
    }

    #[Route('/settings', name: 'settings')]
    public function settings(): Response {
        $lfm_params = Yaml::parseFile(self::CONF_FILE);
        return $this->render('settings/settings.html.twig', ['data' => $lfm_params['parameters']]);
    }

    #[Route('/settings/update', name: 'settings_update', methods: "POST")]
    public function settings_update(): Response {
        $lfm_params = Yaml::parseFile(self::CONF_FILE);
        $request = Request::createFromGlobals();
        $this->addFlash('info', 'Settings updated!');
        $lfm_params['parameters']['lastfm'] = $request->request->all("lastfm");
        $lfm_params['parameters']['deezer'] = $request->request->all("deezer");
        $lfm_params['parameters']['listenbrainz'] = $request->request->all("listenbrainz");
        $lfm_params['parameters']['baseurl'] = $request->request->get('baseurl');
        $yaml = Yaml::dump($lfm_params, 2);
        file_put_contents(self::CONF_FILE, $yaml);
        return $this->redirectToRoute('settings');
    }

}
