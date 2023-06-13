<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpClient\CurlHttpClient;
use PouleR\DeezerAPI\DeezerAPIClient;
use Symfony\Component\HttpFoundation\RequestStack;

class HomeController extends AbstractController {

    private string $baseUrl;
    private array $settings;
    private string $callback;
    private CurlHttpClient $curl;
    private DeezerAPIClient $client;
    private RequestStack $requestStack;

    public function __construct(ParameterBagInterface $settings, RequestStack $requestStack) {
        $this->requestStack = $requestStack;
        $this->baseUrl = $settings->get("baseurl");
        $this->settings = $settings->get("deezer");
        $this->callback = $settings->get("baseurl");
        $this->curl = new CurlHttpClient();
        $this->client = new DeezerAPIClient($this->curl);
    }

    #[Route('/', name: 'home')]
    public function index(): Response {
        $request = Request::createFromGlobals();
        $session = $this->requestStack->getSession();

        if ($session->get('access_token') == null || empty($session->get('access_token'))) {
            header("Location:" . $this->baseUrl . "deezer/connect");
            exit;
        } else {
            return $this->render('home/index.html.twig');
        }
    }

}
