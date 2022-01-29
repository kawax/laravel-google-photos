<?php

namespace Revolution\Google\Photos\Concerns;

use Google\Service\PhotosLibrary\BatchCreateMediaItemsRequest;
use Google\Service\PhotosLibrary\NewMediaItem;
use Google\Service\PhotosLibrary\Resource\MediaItems;
use Google\Service\PhotosLibrary\SearchMediaItemsRequest;
use Google\Service\PhotosLibrary\SimpleMediaItem;

trait WithMediaItems
{
    /**
     * mediaItems.search.
     *
     * @param  array  $searchParams
     * @param  array  $optParams
     * @return object
     */
    public function search(array $searchParams = [], array $optParams = []): object
    {
        $search = new SearchMediaItemsRequest($searchParams);

        return $this->serviceMediaItems()->search($search, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.get.
     *
     * @param  string  $mediaItemId
     * @param  array  $optParams
     * @return object
     */
    public function media(string $mediaItemId, array $optParams = []): object
    {
        return $this->serviceMediaItems()->get($mediaItemId, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.batchCreate.
     *
     * @param  array  $uploadTokens
     * @param  string  $albumId
     * @param  array  $optParams
     * @return object
     */
    public function batchCreate(array $uploadTokens, string $albumId = '', array $optParams = []): object
    {
        $newMediaItems = [];

        foreach ($uploadTokens as $token) {
            $newMediaItems[] = $this->prepareCreate($token);
        }

        $request = new BatchCreateMediaItemsRequest([
            'newMediaItems' => $newMediaItems,
            'albumId' => $albumId,
        ]);

        return $this->serviceMediaItems()->batchCreate($request, $optParams)->toSimpleObject();
    }

    /**
     * @return MediaItems
     */
    protected function serviceMediaItems(): MediaItems
    {
        return $this->getService()->mediaItems;
    }

    /**
     * @param  string  $uploadToken
     * @return NewMediaItem
     */
    protected function prepareCreate(string $uploadToken): NewMediaItem
    {
        $simple = new SimpleMediaItem([
            'uploadToken' => $uploadToken,
        ]);

        return new NewMediaItem([
            'simpleMediaItem' => $simple,
        ]);
    }
}
