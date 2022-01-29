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

use Google\Service\PhotosLibrary\AddEnrichmentToAlbumRequest;
use Google\Service\PhotosLibrary\AddEnrichmentToAlbumResponse;
use Google\Service\PhotosLibrary\Album;
use Google\Service\PhotosLibrary\BatchAddMediaItemsToAlbumRequest;
use Google\Service\PhotosLibrary\BatchAddMediaItemsToAlbumResponse;
use Google\Service\PhotosLibrary\BatchRemoveMediaItemsFromAlbumRequest;
use Google\Service\PhotosLibrary\BatchRemoveMediaItemsFromAlbumResponse;
use Google\Service\PhotosLibrary\CreateAlbumRequest;
use Google\Service\PhotosLibrary\ListAlbumsResponse;
use Google\Service\PhotosLibrary\ShareAlbumRequest;
use Google\Service\PhotosLibrary\ShareAlbumResponse;
use Google\Service\PhotosLibrary\UnshareAlbumRequest;
use Google\Service\PhotosLibrary\UnshareAlbumResponse;

/**
 * The "albums" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google\Service\PhotosLibrary(...);
 *   $albums = $photoslibraryService->albums;
 *  </code>
 */
class Albums extends \Google\Service\Resource
{
  /**
   * Adds an enrichment at a specified position in a defined album.
   * (albums.addEnrichment)
   *
   * @param string $albumId Required. Identifier of the album where the enrichment
   * is to be added.
   * @param AddEnrichmentToAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return AddEnrichmentToAlbumResponse
   */
  public function addEnrichment($albumId, AddEnrichmentToAlbumRequest $postBody, $optParams = [])
  {
    $params = ['albumId' => $albumId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('addEnrichment', [$params], AddEnrichmentToAlbumResponse::class);
  }
  /**
   * Adds one or more media items in a user's Google Photos library to an album.
   * The media items and albums must have been created by the developer via the
   * API. Media items are added to the end of the album. If multiple media items
   * are given, they are added in the order specified in this call. Each album can
   * contain up to 20,000 media items. Only media items that are in the user's
   * library can be added to an album. For albums that are shared, the album must
   * either be owned by the user or the user must have joined the album as a
   * collaborator. Partial success is not supported. The entire request will fail
   * if an invalid media item or album is specified. (albums.batchAddMediaItems)
   *
   * @param string $albumId Required. Identifier of the Album that the media items
   * are added to.
   * @param BatchAddMediaItemsToAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchAddMediaItemsToAlbumResponse
   */
  public function batchAddMediaItems($albumId, BatchAddMediaItemsToAlbumRequest $postBody, $optParams = [])
  {
    $params = ['albumId' => $albumId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchAddMediaItems', [$params], BatchAddMediaItemsToAlbumResponse::class);
  }
  /**
   * Removes one or more media items from a specified album. The media items and
   * the album must have been created by the developer via the API. For albums
   * that are shared, this action is only supported for media items that were
   * added to the album by this user, or for all media items if the album was
   * created by this user. Partial success is not supported. The entire request
   * will fail and no action will be performed on the album if an invalid media
   * item or album is specified. (albums.batchRemoveMediaItems)
   *
   * @param string $albumId Required. Identifier of the Album that the media items
   * are to be removed from.
   * @param BatchRemoveMediaItemsFromAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return BatchRemoveMediaItemsFromAlbumResponse
   */
  public function batchRemoveMediaItems($albumId, BatchRemoveMediaItemsFromAlbumRequest $postBody, $optParams = [])
  {
    $params = ['albumId' => $albumId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('batchRemoveMediaItems', [$params], BatchRemoveMediaItemsFromAlbumResponse::class);
  }
  /**
   * Creates an album in a user's Google Photos library. (albums.create)
   *
   * @param CreateAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Album
   */
  public function create(CreateAlbumRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Album::class);
  }
  /**
   * Returns the album based on the specified `albumId`. The `albumId` must be the
   * ID of an album owned by the user or a shared album that the user has joined.
   * (albums.get)
   *
   * @param string $albumId Required. Identifier of the album to be requested.
   * @param array $optParams Optional parameters.
   * @return Album
   */
  public function get($albumId, $optParams = [])
  {
    $params = ['albumId' => $albumId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Album::class);
  }
  /**
   * Lists all albums shown to a user in the Albums tab of the Google Photos app.
   * (albums.listAlbums)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool excludeNonAppCreatedData If set, the results exclude media
   * items that were not created by this app. Defaults to false (all albums are
   * returned). This field is ignored if the photoslibrary.readonly.appcreateddata
   * scope is used.
   * @opt_param int pageSize Maximum number of albums to return in the response.
   * Fewer albums might be returned than the specified number. The default
   * `pageSize` is 20, the maximum is 50.
   * @opt_param string pageToken A continuation token to get the next page of the
   * results. Adding this to the request returns the rows after the `pageToken`.
   * The `pageToken` should be the value returned in the `nextPageToken` parameter
   * in the response to the `listAlbums` request.
   * @return ListAlbumsResponse
   */
  public function listAlbums($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAlbumsResponse::class);
  }
  /**
   * Update the album with the specified `id`. Only the `id`, `title` and
   * `cover_photo_media_item_id` fields of the album are read. The album must have
   * been created by the developer via the API and must be owned by the user.
   * (albums.patch)
   *
   * @param string $id Identifier for the album. This is a persistent identifier
   * that can be used between sessions to identify this album.
   * @param Album $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Required. Indicate what fields in the provided
   * album to update. The only valid values are `title` and
   * `cover_photo_media_item_id`.
   * @return Album
   */
  public function patch($id, Album $postBody, $optParams = [])
  {
    $params = ['id' => $id, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Album::class);
  }
  /**
   * Marks an album as shared and accessible to other users. This action can only
   * be performed on albums which were created by the developer via the API.
   * (albums.share)
   *
   * @param string $albumId Required. Identifier of the album to be shared. This
   * `albumId` must belong to an album created by the developer.
   * @param ShareAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return ShareAlbumResponse
   */
  public function share($albumId, ShareAlbumRequest $postBody, $optParams = [])
  {
    $params = ['albumId' => $albumId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('share', [$params], ShareAlbumResponse::class);
  }
  /**
   * Marks a previously shared album as private. This means that the album is no
   * longer shared and all the non-owners will lose access to the album. All non-
   * owner content will be removed from the album. If a non-owner has previously
   * added the album to their library, they will retain all photos in their
   * library. This action can only be performed on albums which were created by
   * the developer via the API. (albums.unshare)
   *
   * @param string $albumId Required. Identifier of the album to be unshared. This
   * album id must belong to an album created by the developer.
   * @param UnshareAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return UnshareAlbumResponse
   */
  public function unshare($albumId, UnshareAlbumRequest $postBody, $optParams = [])
  {
    $params = ['albumId' => $albumId, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('unshare', [$params], UnshareAlbumResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Albums::class, 'Google_Service_PhotosLibrary_Resource_Albums');
