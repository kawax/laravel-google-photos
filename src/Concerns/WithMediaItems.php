<?php

namespace Revolution\Google\Photos\Concerns;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\RetrySettings;
use Google\Photos\Library\V1\AlbumPosition;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\Filters;
use Google\Photos\Library\V1\PhotosLibraryResourceFactory;

trait WithMediaItems
{
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
}
