<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use App\Lib\ListenbrainzApi;
use App\Entity\Album;

/**
 * Description of ListenbrainzController
 *
 * @author fb
 */
class ListenbrainzController extends AbstractController {
    private DeezerController $dz;
    private $trackApi;

    public function __construct(
            private HttpClientInterface $client, ParameterBagInterface $settings, DeezerController $dz
    ) {
        $this->dz = $dz;
        $this->trackApi = new ListenbrainzApi($client, $settings);
    }

    #[Route('/listenbrainz/test', name: 'listenbrainz_test')]
    public function listenbrainz_recent(): Response {
        $data = $this->trackApi->recent();

        return $this->render('listenbrainz/recent.html.twig', ['data' => $data['payload']['listens']]);
    }

    #[Route('/listenbrainz/scrobble', name: 'listenbrainz_scrobble')]
    public function scrobble(Request $request): JsonResponse {
        $data = $request->request->all("form");
        $id = $data['id'];
        $params['artist'] = $data['artist'];
        $params['album'] = $data['title'];
        $range = $data['range'];

        $scrobbled = $this->dz->scrobbleTracks($this->trackApi, $id, $params, $range);
        return new JsonResponse($scrobbled);        // 
    }

    #[Route('/listenbrainz/scrobleadd', name: 'listenbrainz_scrobbleadd')]
    public function scrobleadd(): Response {
        $album = new Album();

        $form = $this->createFormBuilder($album)
                ->setAction($this->generateUrl('listenbrainz_scrobble'))
                ->add('id', TextType::class, ['label' => 'ID:'])
                ->add('saveAndAdd', ButtonType::class, ['label' => 'Load album'])
                ->add('title', TextType::class, ['label' => 'Title:'])
                ->add('artist', TextType::class, ['label' => 'Artist:'])
                ->add('range', TextType::class, ['label' => 'Range:'])
                ->add('save', SubmitType::class, ['label' => 'Scrobble album'])
                ->getForm();

        return $this->render('listenbrainz/add.html.twig', ['form' => $form]);
    }

}
