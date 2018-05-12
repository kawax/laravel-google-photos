<?php

namespace Revolution\Google\Photos\Traits;

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
