<?php

namespace Revolution\Google\Photos;

use Google\Service;
use Google\Service\PhotosLibrary;
use Illuminate\Container\Container;
use Illuminate\Support\Traits\Macroable;
use PulkitJalan\Google\Client;
use Revolution\Google\Photos\Contracts\Factory;

class Photos implements Factory
{
    use Concerns\WithAlbums;
    use Concerns\WithMediaItems;
    use Concerns\WithSharedAlbums;
    use Concerns\WithUploads;
    use Macroable;

    /**
     * @var PhotosLibrary
     */
    protected PhotosLibrary $service;

    /**
     * @param  PhotosLibrary|Service  $service
     *
     * @return $this
     */
    public function setService(PhotosLibrary|Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return PhotosLibrary
     */
    public function getService(): PhotosLibrary
    {
        return $this->service;
    }

    /**
     * set access_token and set new service.
     *
     * @param  array|string  $token
     *
     * @return $this
     * @throws \Exception
     */
    public function setAccessToken(array|string $token): self
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
    public function getAccessToken(): array
    {
        return $this->getService()->getClient()->getAccessToken();
    }
}
