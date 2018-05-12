<?php

namespace Revolution\Google\Photos\Traits;

trait SharedAlbums
{
    /**
     * @param array $optParams
     *
     * @return object
     */
    public function listSharedAlbums($optParams = [])
    {
        return $this->getService()->sharedAlbums->listSharedAlbums($optParams)->toSimpleObject();
    }
}
