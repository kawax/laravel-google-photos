<?php

namespace Revolution\Google\Photos\Facades;

use Google\ApiCore\PagedListResponse;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Types\Album;
use Illuminate\Support\Facades\Facade;
use Revolution\Google\Photos\Contracts\Factory;
use Revolution\Google\Photos\PhotosClient;

/**
 * @method static PagedListResponse search(array $optionalArgs = [])
 * @method static BatchCreateMediaItemsResponse batchCreate(array $uploadTokens, array $optionalArgs = [])
 * @method static Album createAlbum(array $data = [], array $optionalArgs = [])
 * @method static static withToken(string|array $token)
 * @method static static setService(PhotosLibraryClient $service)
 * @method static PhotosLibraryClient getService()
 *
 * @see PhotosClient
 *
 * @mixin PhotosLibraryClient
 */
class Photos extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
