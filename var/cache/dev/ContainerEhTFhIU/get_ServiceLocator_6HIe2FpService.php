<?php

namespace ContainerEhTFhIU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_6HIe2FpService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.6HIe2Fp' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.6HIe2Fp'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'trackApi' => ['privates', '.errored..service_locator.6HIe2Fp.LastFmApi\\Api\\TrackApi', NULL, 'Cannot autowire service ".service_locator.6HIe2Fp": it references class "LastFmApi\\Api\\TrackApi" but no such service exists.'],
        ], [
            'trackApi' => 'LastFmApi\\Api\\TrackApi',
        ]);
    }
}
