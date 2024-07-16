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
     */
    public function search(array $searchParams = [], array $optParams = []): object
    {
        $search = new SearchMediaItemsRequest($searchParams);

        return $this->serviceMediaItems()->search($search, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.get.
     */
    public function media(string $mediaItemId, array $optParams = []): object
    {
        return $this->serviceMediaItems()->get($mediaItemId, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.batchCreate.
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

    protected function serviceMediaItems(): MediaItems
    {
        return $this->getService()->mediaItems;
    }

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
