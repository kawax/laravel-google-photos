<?php

namespace Revolution\Google\Photos;

use Google\ApiCore\ValidationException;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Macroable;
use Revolution\Google\Photos\Contracts\Factory;

class PhotosClient implements Factory
{
    use Concerns\WithAlbums;
    use Concerns\WithMediaItems;
    use Macroable {
        __call as macroCall;
    }
    use Conditionable;
    use ForwardsCalls;

    protected PhotosLibraryClient $service;

    public function setService(PhotosLibraryClient $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getService(): PhotosLibraryClient
    {
        return $this->service;
    }

    /**
     * Set token.
     *
     * @param  string|array{client_id: string, client_secret: string, refresh_token: string}  $token
     *
     * @throws ValidationException
     */
    public function withToken(string|array $token): static
    {
        if (is_string($token)) {
            $token = [
                'client_id' => config('google.client_id'),
                'client_secret' => config('google.client_secret'),
                'refresh_token' => $token,
            ];
        }

        $credentials = new UserRefreshCredentials(config('google.scopes'), $token);

        $client = new PhotosLibraryClient(['credentials' => $credentials]);

        return $this->setService($client);
    }

    /**
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        return $this->forwardCallTo($this->getService(), $method, $parameters);
    }
}
