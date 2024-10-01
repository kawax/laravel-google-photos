<?php

namespace Revolution\Google\Photos;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\ValidationException;
use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Photos\Library\V1\AlbumPosition;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\Filters;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Library\V1\PhotosLibraryResourceFactory;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Support\Traits\Macroable;
use Revolution\Google\Photos\Contracts\Factory;
use Revolution\Google\Photos\Support\Token;
use RuntimeException;

class PhotosClient implements Factory
{
    use Conditionable;
    use ForwardsCalls;
    use Macroable {
        __call as macroCall;
    }

    protected ?PhotosLibraryClient $service = null;

    public function setService(PhotosLibraryClient $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function getService(): PhotosLibraryClient
    {
        if (is_null($this->service)) {
            throw new RuntimeException('Missing token. Set the token using withToken().');
        }

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
        $token = Token::refreshArray($token);

        $credentials = new UserRefreshCredentials(config('google.scopes'), $token);

        $client = new PhotosLibraryClient(['credentials' => $credentials]);

        return $this->setService($client);
    }

    /**
     * mediaItems.search.
     *
     * @param  array{albumId?: string, pageSize?: integer, pageToken?: string, filters?: Filters, orderBy?: string, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function search(array $optionalArgs = []): PagedListResponse
    {
        return $this->getService()->searchMediaItems($optionalArgs);
    }

    /**
     * mediaItems.batchCreate.
     *
     * @param  array<string>  $uploadTokens
     * @param  array{albumId?: string, albumPosition?: AlbumPosition, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function batchCreate(array $uploadTokens, array $optionalArgs = []): BatchCreateMediaItemsResponse
    {
        $newMediaItems = [];

        foreach ($uploadTokens as $token) {
            $newMediaItems[] = PhotosLibraryResourceFactory::newMediaItem($token);
        }

        return $this->getService()->batchCreateMediaItems($newMediaItems, $optionalArgs);
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
