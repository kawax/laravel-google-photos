<?php

namespace Revolution\Google\Photos\Concerns;

use Google\Service\PhotosLibrary\Resource\SharedAlbums;

trait WithSharedAlbums
{
    /**
     * sharedAlbums.listSharedAlbums.
     *
     * @param  array  $optParams
     *
     * @return object
     */
    public function listSharedAlbums(array $optParams = []): object
    {
        return $this->serviceSharedAlbums()->listSharedAlbums($optParams)->toSimpleObject();
    }

    /**
     * @return SharedAlbums
     */
    protected function serviceSharedAlbums(): SharedAlbums
    {
        return $this->getService()->sharedAlbums;
    }
}
