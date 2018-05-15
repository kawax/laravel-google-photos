<?php

namespace Revolution\Google\Photos\Traits;

use Revolution\Google\Photos\Contracts\Photos;

/**
 * use at User model
 */
trait PhotosLibrary
{
    /**
     * @return Photos
     */
    public function photos()
    {
        $token = $this->photosAccessToken();

        return app(Photos::class)->setAccessToken($token);
    }

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    abstract protected function photosAccessToken();
}
