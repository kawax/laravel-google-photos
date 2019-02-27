<?php

namespace Revolution\Google\Photos\Traits;

use Illuminate\Container\Container;
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

        return Container::getInstance()->make(Factory::class)->setAccessToken($token);
    }

    /**
     * Get the Access Token
     *
     * @return string|array
     */
    abstract protected function photosAccessToken();
}
