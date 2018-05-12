<?php

namespace Revolution\Google\Photos\Traits;

use Revolution\Google\Photos\PhotosInterface;
use PulkitJalan\Google\Facades\Google;

/**
 * use at User model
 */
trait PhotosLibrary
{
    /**
     * @return \Revolution\Google\Photos\PhotosInterface
     * @throws \Exception
     */
    public function photos()
    {
        $token = $this->photosAccessToken();

        Google::setAccessToken($token);

        if (isset($token['refresh_token']) and Google::isAccessTokenExpired()) {
            Google::fetchAccessTokenWithRefreshToken();
        }

        return app(PhotosInterface::class)->setService(Google::make('PhotosLibrary'));
    }

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    abstract protected function photosAccessToken();
}
