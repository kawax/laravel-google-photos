<?php

namespace Revolution\Google\Photos\Traits;

use Revolution\Google\Photos\PhotosInterface;

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

        return app(PhotosInterface::class)->setAccessToken($token);
    }

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    abstract protected function photosAccessToken();
}
