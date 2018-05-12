<?php

namespace Revolution\Google\Photos;

use Google_Service_PhotosLibrary;

use Illuminate\Support\Traits\Macroable;

class Photos implements PhotosInterface
{
    use Traits\Albums;
    use Traits\MediaItems;
    use Traits\SharedAlbums;
    use Traits\Uploads;

    use Macroable;

    /**
     * @var \Google_Service_PhotosLibrary
     */
    protected $service;

    /**
     * @param Google_Service_PhotosLibrary|\Google_Service $service
     *
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return Google_Service_PhotosLibrary
     */
    public function getService(): Google_Service_PhotosLibrary
    {
        return $this->service;
    }
}
