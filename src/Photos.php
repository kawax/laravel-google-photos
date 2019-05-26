<?php

namespace Revolution\Google\Photos;

use Illuminate\Container\Container;
use Illuminate\Support\Traits\Macroable;

use Revolution\Google\Photos\Contracts\Factory;

use Google_Service_PhotosLibrary;
use PulkitJalan\Google\Client;

class Photos implements Factory
{
    use Traits\Albums;
    use Traits\MediaItems;
    use Traits\SharedAlbums;
    use Traits\Uploads;

    use Macroable;

    /**
     * @var Google_Service_PhotosLibrary
     */
    protected $service;

    /**
     * @param  Google_Service_PhotosLibrary|\Google_Service  $service
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

    /**
     * set access_token and set new service
     *
     * @param  string|array  $token
     *
     * @return $this
     * @throws \Exception
     */
    public function setAccessToken($token)
    {
        /**
         * @var Client $google
         */
        $google = Container::getInstance()->make(Client::class);

        $google->getCache()->clear();

        $google->setAccessToken($token);

        if (isset($token['refresh_token']) and $google->isAccessTokenExpired()) {
            $google->fetchAccessTokenWithRefreshToken();
        }

        return $this->setService($google->make('PhotosLibrary'));
    }

    /**
     * @return array
     */
    public function getAccessToken()
    {
        return $this->getService()->getClient()->getAccessToken();
    }
}
