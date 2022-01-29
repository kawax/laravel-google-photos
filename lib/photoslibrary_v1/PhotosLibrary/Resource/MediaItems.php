<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\PhotosLibrary\Resource;

use Google\Service\PhotosLibrary\BatchCreateMediaItemsRequest;
use Google\Service\PhotosLibrary\BatchCreateMediaItemsResponse;
use Google\Service\PhotosLibrary\BatchGetMediaItemsResponse;
use Google\Service\PhotosLibrary\ListMediaItemsResponse;
use Google\Service\PhotosLibrary\MediaItem;
use Google\Service\PhotosLibrary\SearchMediaItemsRequest;
use Google\Service\PhotosLibrary\SearchMediaItemsResponse;

/**
 * The "mediaItems" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google\Service\PhotosLibrary(...);
 *   $mediaItems = $photoslibraryService->mediaItems;
 *  </code>
 */
class MediaItems extends \Google\Service\Resource
{
  /**
   * Creates one or more media items in a user's Google Photos library. This is
   * the second step for creating a media item. For details regarding Step 1,
   * uploading the raw bytes to a Google Server, see Uploading media. This call
   * adds the media item to the library. If an album `id` is specified, the call
   * adds the media item to the album too. Each album can contain up to 20,000
   * media items. By default, the media item will be added to the end of the
   * library or album. If an album `id` and position are both defined, the media
   * item is added to the album at the specified position. If the call contains
   * multiple media items, they're added at the specified position. If you are
   * creating a media item in a shared album where you are not the owner, you are
   * not allowed to position the media item. Doing so will result in a `BAD
   * REQUEST` error. (mediaItems.batchCreate)
   *
   * @param BatchCreateMediaItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchCreateMediaItemsResponse
   */
  public function batchCreate(BatchCreateMediaItemsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchCreate', [$params], BatchCreateMediaItemsResponse::class);
  }
  /**
   * Returns the list of media items for the specified media item identifiers.
   * Items are returned in the same order as the supplied identifiers.
   * (mediaItems.batchGet)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param string mediaItemIds Required. Identifiers of the media items to be
   * requested. Must not contain repeated identifiers and cannot be empty. The
   * maximum number of media items that can be retrieved in one call is 50.
   * @return BatchGetMediaItemsResponse
   */
  public function batchGet($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('batchGet', [$params], BatchGetMediaItemsResponse::class);
  }
  /**
   * Returns the media item for the specified media item identifier.
   * (mediaItems.get)
   *
   * @param string $mediaItemId Required. Identifier of the media item to be
   * requested.
   * @param array $optParams Optional parameters.
   * @return MediaItem
   */
  public function get($mediaItemId, $optParams = [])
  {
    $params = ['mediaItemId' => $mediaItemId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MediaItem::class);
  }
  /**
   * List all media items from a user's Google Photos library.
   * (mediaItems.listMediaItems)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Maximum number of media items to return in the
   * response. Fewer media items might be returned than the specified number. The
   * default `pageSize` is 25, the maximum is 100.
   * @opt_param string pageToken A continuation token to get the next page of the
   * results. Adding this to the request returns the rows after the `pageToken`.
   * The `pageToken` should be the value returned in the `nextPageToken` parameter
   * in the response to the `listMediaItems` request.
   * @return ListMediaItemsResponse
   */
  public function listMediaItems($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMediaItemsResponse::class);
  }
  /**
   * Update the media item with the specified `id`. Only the `id` and
   * `description` fields of the media item are read. The media item must have
   * been created by the developer via the API and must be owned by the user.
   * (mediaItems.patch)
   *
   * @param string $id Identifier for the media item. This is a persistent
   * identifier that can be used between sessions to identify this media item.
   * @param MediaItem $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Indicate what fields in the provided
   * media item to update. The only valid value is `description`.
   * @return MediaItem
   */
  public function patch($id, MediaItem $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], MediaItem::class);
  }
  /**
   * Searches for media items in a user's Google Photos library. If no filters are
   * set, then all media items in the user's library are returned. If an album is
   * set, all media items in the specified album are returned. If filters are
   * specified, media items that match the filters from the user's library are
   * listed. If you set both the album and the filters, the request results in an
   * error. (mediaItems.search)
   *
   * @param SearchMediaItemsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return SearchMediaItemsResponse
   */
  public function search(SearchMediaItemsRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('search', [$params], SearchMediaItemsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaItems::class, 'Google_Service_PhotosLibrary_Resource_MediaItems');
