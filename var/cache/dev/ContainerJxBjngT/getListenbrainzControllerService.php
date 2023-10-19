<?php

namespace ContainerJxBjngT;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getListenbrainzControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\ListenbrainzController' shared autowired service.
     *
     * @return \App\Controller\ListenbrainzController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/ListenbrainzController.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-client-contracts/HttpClientInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-client/DecoratorTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-client/UriTemplateHttpClient.php';

        $container->services['App\\Controller\\ListenbrainzController'] = $instance = new \App\Controller\ListenbrainzController(new \Symfony\Component\HttpClient\UriTemplateHttpClient(($container->privates['http_client.transport'] ?? $container->load('getHttpClient_TransportService')), NULL, []), ($container->privates['parameter_bag'] ??= new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container)), ($container->services['App\\Controller\\DeezerController'] ?? $container->load('getDeezerControllerService')));

        $instance->setContainer(($container->privates['.service_locator.O2p6Lk7'] ?? $container->load('get_ServiceLocator_O2p6Lk7Service'))->withContext('App\\Controller\\ListenbrainzController', $container));

        return $instance;
    }
}