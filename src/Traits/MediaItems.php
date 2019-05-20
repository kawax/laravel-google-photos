<?php

namespace Revolution\Google\Photos\Traits;

use Google_Service_PhotosLibrary_SearchMediaItemsRequest as SearchMediaItemsRequest;
use Google_Service_PhotosLibrary_BatchCreateMediaItemsRequest as BatchCreateMediaItemsRequest;
use Google_Service_PhotosLibrary_SimpleMediaItem as SimpleMediaItem;
use Google_Service_PhotosLibrary_NewMediaItem as NewMediaItem;

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
    public function search($searchParams = [], $optParams = [])
    {
        $search = new SearchMediaItemsRequest($searchParams);

        return $this->getService()->mediaItems->search($search, $optParams)->toSimpleObject();
    }

    /**
     * mediaItems.get
     *
     * @param  string  $mediaItemId
     * @param  array  $optParams
     *
     * @return object
     */
    public function media(string $mediaItemId, $optParams = [])
    {
        return $this->getService()->mediaItems->get($mediaItemId, $optParams)->toSimpleObject();
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
    public function batchCreate(array $uploadTokens, string $albumId = '', $optParams = [])
    {
        $newMediaItems = [];

        foreach ($uploadTokens as $token) {
            $newMediaItems[] = $this->prepareCreate($token);
        }

        $request = new BatchCreateMediaItemsRequest([
            'newMediaItems' => $newMediaItems,
            'albumId'       => $albumId,
        ]);

        return $this->getService()->mediaItems->batchCreate($request, $optParams)->toSimpleObject();
    }

    /**
     * @param  string  $uploadToken
     *
     * @return \Google_Service_PhotosLibrary_NewMediaItem
     */
    private function prepareCreate(string $uploadToken)
    {
        $simple = new SimpleMediaItem([
            'uploadToken' => $uploadToken,
        ]);

        return new NewMediaItem([
            'simpleMediaItem' => $simple,
        ]);
    }
}
