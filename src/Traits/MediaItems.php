<?php

namespace Revolution\Google\Photos\Traits;

use Google_Service_PhotosLibrary_SearchMediaItemsRequest as SearchMediaItemsRequest;
use Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest as BatchCreateMediaItemsRequest;
use Google_Service_PhotosLibrary_SimpleMediaItem as SimpleMediaItem;
use Google_Service_PhotosLibrary_NewMediaItem as NewMediaItem;
use Google_Service_PhotosLibrary_Resource_MediaItems as Resource_MediaItems;

trait MediaItems
{
    /**
     * mediaItems.search
     *
     * @param  array  $searchParams
     * @param  array  $optParams
     *
     * @return object
     */
    public function search(array $searchParams = [], array $optParams = [])
    {
        $search = new SearchMediaItemsRequest($searchParams);

        return $this->serviceMediaItems()->search($search, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.get
     *
     * @param  string  $mediaItemId
     * @param  array  $optParams
     *
     * @return object
     */
    public function media(string $mediaItemId, array $optParams = [])
    {
        return $this->serviceMediaItems()->get($mediaItemId, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.batchCreate
     *
     * @param  array  $uploadTokens
     * @param  string  $albumId
     * @param  array  $optParams
     *
     * @return object
     */
    public function batchCreate(array $uploadTokens, string $albumId = '', array $optParams = [])
    {
        $newMediaItems = [];

        foreach ($uploadTokens as $token) {
            $newMediaItems[] = $this->prepareCreate($token);
        }

        $request = new BatchCreateMediaItemsRequest([
            'newMediaItems' => $newMediaItems,
            'albumId'       => $albumId,
        ]);

        return $this->serviceMediaItems()->batchCreate($request, $optParams)->toSimpleObject();
    }

    /**
     * @return Resource_MediaItems
     */
    protected function serviceMediaItems(): Resource_MediaItems
    {
        return $this->getService()->mediaItems;
    }

    /**
     * @param  string  $uploadToken
     *
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
