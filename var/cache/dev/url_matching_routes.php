<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/deezer/connect' => [[['_route' => 'deezer_connect', '_controller' => 'App\\Controller\\DeezerController::index'], null, null, null, false, false, null]],
        '/deezer/load' => [[['_route' => 'deezer_load', '_controller' => 'App\\Controller\\DeezerController::loadAlbum'], null, null, null, false, false, null]],
        '/deezer/logout' => [[['_route' => 'deezer_logout', '_controller' => 'App\\Controller\\DeezerController::logout'], null, null, null, false, false, null]],
        '/deezer/history' => [[['_route' => 'deezer_history', '_controller' => 'App\\Controller\\DeezerController::getUserHistory'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/lastfm/connect' => [[['_route' => 'lastfm_connect', '_controller' => 'App\\Controller\\LastfmController::connect'], null, null, null, false, false, null]],
        '/lastfm/scrobleadd' => [[['_route' => 'lastfm_scrobbleadd', '_controller' => 'App\\Controller\\LastfmController::scrobleadd'], null, null, null, false, false, null]],
        '/lastfm/scrobble' => [[['_route' => 'lastfm_scrobble', '_controller' => 'App\\Controller\\LastfmController::scrobble'], null, null, null, false, false, null]],
        '/lastfm/recent' => [[['_route' => 'lastfm_recent', '_controller' => 'App\\Controller\\LastfmController::recent'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
