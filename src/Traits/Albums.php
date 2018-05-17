<?php

namespace Revolution\Google\Photos\Traits;

use Google_Service_PhotosLibrary_CreateAlbumRequest as CreateAlbumRequest;
use Google_Service_PhotosLibrary_Album as Album;

trait Albums
{
    /**
     * albums.listAlbums
     *
     * @param array $optParams
     *
     * @return object
     */
    public function listAlbums($optParams = [])
    {
        return $this->getService()->albums->listAlbums($optParams)->toSimpleObject();
    }

    /**
     * albums.create
     *
     * @param array $createParams
     * @param array $optParams
     *
     * @return object
     */
    public function createAlbum($createParams = ['isWriteable' => true], $optParams = [])
    {
        $album = new Album($createParams);
        $request = new CreateAlbumRequest;
        $request->setAlbum($album);

        return $this->getService()->albums->create($request, $optParams)->toSimpleObject();
    }

    /**
     * albums.get
     *
     * @param string $albumId
     *
     * @return object
     */
    public function album(string $albumId)
    {
        return $this->getService()->albums->get($albumId)->toSimpleObject();
    }
}
