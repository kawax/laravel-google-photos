<?php

namespace Revolution\Google\Photos\Concerns;

use Google_Service_PhotosLibrary_Resource_SharedAlbums as Resource_SharedAlbums;

trait SharedAlbums
{
    /**
     * sharedAlbums.listSharedAlbums
     *
     * @param  array  $optParams
     *
     * @return object
     */
    public function listSharedAlbums(array $optParams = [])
    {
        return $this->serviceSharedAlbums()->listSharedAlbums($optParams)->toSimpleObject();
    }

    /**
     * @return Resource_SharedAlbums
     */
    protected function serviceSharedAlbums(): Resource_SharedAlbums
    {
        return $this->getService()->sharedAlbums;
    }
}
