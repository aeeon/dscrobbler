<?php

namespace App\Lib;

use PouleR\DeezerAPI\DeezerAPI;
/**
 * Description of DeezerApi
 *
 * @author fb
 */
class CustomDeezerApi  extends DeezerAPI {
    /**
     * Return the user history.
     *
     * @throws DeezerAPIException
     *
     * @return array|object
     */
    public function getUserHistory()
    {
        return $this->client->apiRequest('GET', 'user/me/history');
    }
    /**
     * Return a album.
     *
     * @param string|int $albumId
     *
     * @return array|object
     *
     * @throws DeezerAPIException
     */
    public function getAlbum($albumId)
    {
        if (empty($albumId)) {
            throw new DeezerAPIException('Get album: invalid albumId');
        }

        return $this->client->apiRequest('GET', 'album/'.$albumId);
    }

    /**
     * Return a list of album's tracks.
     *
     * @param string|int $albumId
     *
     * @return array|object
     *
     * @throws DeezerAPIException
     */
    public function getAlbumTracks($albumId, $index=0)
    {
        if (empty($albumId)) {
            throw new DeezerAPIException('Get album tracks: invalid albumId');
        }

        return $this->client->apiRequest('GET', 'album/'.$albumId.'/tracks', array(), null, array("index"=>$index));
    }    
}
