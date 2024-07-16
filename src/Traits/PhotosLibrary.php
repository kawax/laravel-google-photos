<?php

namespace Revolution\Google\Photos\Traits;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Revolution\Google\Photos\Contracts\Factory;

/**
 * use at User model.
 */
trait PhotosLibrary
{
    /**
     * @throws BindingResolutionException
     */
    public function photos(): Factory
    {
        $token = $this->photosAccessToken();

        return Container::getInstance()->make(Factory::class)->setAccessToken($token);
    }

    /**
     * Get the Access Token.
     */
    abstract protected function photosAccessToken(): array|string;
}
