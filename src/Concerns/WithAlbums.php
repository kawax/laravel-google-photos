<?php

namespace Revolution\Google\Photos\Concerns;

use Google\Service\PhotosLibrary\Album;
use Google\Service\PhotosLibrary\CreateAlbumRequest;
use Google\Service\PhotosLibrary\Resource\Albums;

trait WithAlbums
{
    /**
     * albums.listAlbums.
     */
    public function listAlbums(array $optParams = []): object
    {
        return $this->serviceAlbums()->listAlbums($optParams)->toSimpleObject();
    }

    /**
     * albums.create.
     */
    public function createAlbum(array $createParams = ['isWriteable' => true], array $optParams = []): object
    {
        $album = new Album($createParams);
        $request = new CreateAlbumRequest();
        $request->setAlbum($album);

        return $this->serviceAlbums()->create($request, $optParams)->toSimpleObject();
    }

    /**
     * albums.get.
     */
    public function album(string $albumId): object
    {
        return $this->serviceAlbums()->get($albumId)->toSimpleObject();
    }

    protected function serviceAlbums(): Albums
    {
        return $this->getService()->albums;
    }
}
