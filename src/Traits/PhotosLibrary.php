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
        $token = $this->tokenForPhotoLibrary();

        return Container::getInstance()->make(Factory::class)->withToken($token);
    }

    /**
     * @return string|array{client_id: string, client_secret: string, refresh_token: string}
     */
    abstract protected function tokenForPhotoLibrary(): array|string;
}
