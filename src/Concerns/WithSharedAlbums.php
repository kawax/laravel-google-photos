<?php

namespace Revolution\Google\Photos\Concerns;

use Google\Service\PhotosLibrary\Resource\SharedAlbums;

trait WithSharedAlbums
{
    /**
     * sharedAlbums.listSharedAlbums.
     */
    public function listSharedAlbums(array $optParams = []): object
    {
        return $this->serviceSharedAlbums()->listSharedAlbums($optParams)->toSimpleObject();
    }

    protected function serviceSharedAlbums(): SharedAlbums
    {
        return $this->getService()->sharedAlbums;
    }
}
