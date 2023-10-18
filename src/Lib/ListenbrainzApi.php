<?php

namespace App\Lib;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
/**
 * Description of ListenbrainzApi
 *
 * @author fb
 */
class ListenbrainzApi {

    const AUTH_URL = 'https://api.listenbrainz.org';
    private array $auth_header;
    private array $settings;
    private HttpClientInterface $client;
        
    public function __construct( HttpClientInterface $client, ParameterBagInterface $settings) {
        $this->settings = $settings->get("listenbrainz");
        $this->client = $client;
        $this->auth_header = array("Authorization" => "Token " . $this->settings['token']);       
    }
    public function recent($count=50) {
        $url = self::AUTH_URL . "/1/user/" . $this->settings['username'] . "/listens";
        $response = $this->client->request('GET', $url, [
            'headers' => $this->auth_header,
            'query' => ['count' => $count],
        ]);

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        $content = $response->toArray();

        return $content;
    }
    public function scrobble($params) {
        $payload = [
            [
                "listened_at" =>  $params['timestamp'],
                "track_metadata" => [
                    "artist_name" => $params['artist'],
                    "track_name" => $params['track'],
                    "release_name" => $params['album']
                ]
            ]
        ];
        $url = self::AUTH_URL . "/1/submit-listens";
        $response = $this->client->request('POST', $url, [
            'headers' => $this->auth_header,
            'json' => ['listen_type' => 'single', 'payload' => $payload],
        ]);
// gets the HTTP status code of the response
        $statusCode = $response->getStatusCode();

// gets the HTTP headers as string[][] with the header names lower-cased
        $headers = $response->getHeaders();

        $content = $response->getContent();

        return $content;
    }

}
