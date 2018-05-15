<?php

namespace Revolution\Google\Photos\Traits;

use Revolution\Google\Photos\Contracts\Factory;

/**
 * use at User model
 */
trait PhotosLibrary
{
    /**
     * @return Factory
     */
    public function photos()
    {
        $token = $this->photosAccessToken();

        return app(Factory::class)->setAccessToken($token);
    }

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    abstract protected function photosAccessToken();
}
