<?php

namespace Revolution\Google\Photos;

use Google\ApiCore\ValidationException;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Macroable;
use Revolution\Google\Photos\Contracts\Factory;

class PhotosClient implements Factory
{
    use Concerns\WithAlbums;
    use Concerns\WithMediaItems;
    use Concerns\WithUploads;
    use Macroable;
    use Conditionable;

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
                'client_id' => config('services.google.client_id'),
                'client_secret' => config('services.google.client_secret'),
                'refresh_token' => $token,
            ];
        }

        $credentials = new UserRefreshCredentials(config('google.scopes'), $token);

        $client = new PhotosLibraryClient(['credentials' => $credentials]);

        return $this->setService($client);
    }

    public function getToken(): string
    {
        $token = call_user_func($this->getService()->getCredentialsWrapper()->getAuthorizationHeaderCallback());

        return Str::of($token['authorization'] ?? '')->remove('Bearer ')->toString();
    }
}
