<?php

namespace Revolution\Google\Photos\Concerns;

use Google_Service_PhotosLibrary_Album as Album;
use Google_Service_PhotosLibrary_CreateAlbumRequest as CreateAlbumRequest;
use Google_Service_PhotosLibrary_Resource_Albums as Resource_Albums;

trait Albums
{
    /**
     * albums.listAlbums.
     *
     * @param  array  $optParams
     *
     * @return object
     */
    public function listAlbums(array $optParams = [])
    {
        return $this->serviceAlbums()->listAlbums($optParams)->toSimpleObject();
    }

    /**
     * albums.create.
     *
     * @param  array  $createParams
     * @param  array  $optParams
     *
     * @return object
     */
    public function createAlbum(array $createParams = ['isWriteable' => true], array $optParams = [])
    {
        $album = new Album($createParams);
        $request = new CreateAlbumRequest();
        $request->setAlbum($album);

        return $this->serviceAlbums()->create($request, $optParams)->toSimpleObject();
    }

    /**
     * albums.get.
     *
     * @param  string  $albumId
     *
     * @return object
     */
    public function album(string $albumId)
    {
        return $this->serviceAlbums()->get($albumId)->toSimpleObject();
    }

    /**
     * @return Resource_Albums
     */
    protected function serviceAlbums(): Resource_Albums
    {
        return $this->getService()->albums;
    }
}
