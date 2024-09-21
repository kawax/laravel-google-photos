<?php

namespace Revolution\Google\Photos\Concerns;

use Google\ApiCore\ApiException;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\RetrySettings;
use Google\Photos\Library\V1\BatchCreateMediaItemsResponse;
use Google\Photos\Library\V1\NewMediaItem;
use Google\Photos\Library\V1\SimpleMediaItem;
use Google\Photos\Types\MediaItem;
use Google\Service\PhotosLibrary\AlbumPosition;
use Google\Service\PhotosLibrary\Filters;

trait WithMediaItems
{
    /**
     * List all media items from a user's Google Photos library.
     *
     * @param  array{pageSize?: integer, pageToken?: string, retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function listMediaItems(array $optionalArgs = []): PagedListResponse
    {
        return $this->getService()->listMediaItems($optionalArgs);
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
     * mediaItems.get.
     *
     * @param  array{retrySettings?: RetrySettings|array}  $optionalArgs
     *
     * @throws ApiException
     */
    public function getMediaItem(string $mediaItemId, array $optionalArgs = []): MediaItem
    {
        return $this->getService()->getMediaItem($mediaItemId, $optionalArgs);
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
            $newMediaItems[] = $this->prepareCreate($token);
        }

        return $this->getService()->batchCreateMediaItems($newMediaItems, $optionalArgs);
    }

    protected function prepareCreate(string $uploadToken): NewMediaItem
    {
        $simple = (new SimpleMediaItem())->setUploadToken($uploadToken);

        return (new NewMediaItem())->setSimpleMediaItem($simple);
    }
}
