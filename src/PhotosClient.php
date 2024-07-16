<?php

namespace Revolution\Google\Photos;

use Google\Service;
use Google\Service\PhotosLibrary;
use Illuminate\Support\Traits\Macroable;
use Revolution\Google\Client\Facades\Google;
use Revolution\Google\Photos\Contracts\Factory;

class PhotosClient implements Factory
{
    use Concerns\WithAlbums;
    use Concerns\WithMediaItems;
    use Concerns\WithSharedAlbums;
    use Concerns\WithUploads;
    use Macroable;

    protected PhotosLibrary $service;

    public function setService(PhotosLibrary|Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getService(): PhotosLibrary
    {
        return $this->service;
    }

    /**
     * set access_token and set new service.
     */
    public function setAccessToken(array|string $token): static
    {
        Google::getCache()->clear();

        Google::setAccessToken($token);

        if (isset($token['refresh_token']) and Google::isAccessTokenExpired()) {
            Google::fetchAccessTokenWithRefreshToken();
        }

        return $this->setService(Google::make('PhotosLibrary'));
    }

    public function getAccessToken(): array
    {
        return $this->getService()->getClient()->getAccessToken();
    }
}
