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

use Google\Service\PhotosLibrary\Album;
use Google\Service\PhotosLibrary\JoinSharedAlbumRequest;
use Google\Service\PhotosLibrary\JoinSharedAlbumResponse;
use Google\Service\PhotosLibrary\LeaveSharedAlbumRequest;
use Google\Service\PhotosLibrary\LeaveSharedAlbumResponse;
use Google\Service\PhotosLibrary\ListSharedAlbumsResponse;

/**
 * The "sharedAlbums" collection of methods.
 * Typical usage is:
 *  <code>
 *   $photoslibraryService = new Google\Service\PhotosLibrary(...);
 *   $sharedAlbums = $photoslibraryService->sharedAlbums;
 *  </code>
 */
class SharedAlbums extends \Google\Service\Resource
{
  /**
   * Returns the album based on the specified `shareToken`. (sharedAlbums.get)
   *
   * @param string $shareToken Required. Share token of the album to be requested.
   * @param array $optParams Optional parameters.
   * @return Album
   */
  public function get($shareToken, $optParams = [])
  {
    $params = ['shareToken' => $shareToken];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Album::class);
  }
  /**
   * Joins a shared album on behalf of the Google Photos user. (sharedAlbums.join)
   *
   * @param JoinSharedAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return JoinSharedAlbumResponse
   */
  public function join(JoinSharedAlbumRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('join', [$params], JoinSharedAlbumResponse::class);
  }
  /**
   * Leaves a previously-joined shared album on behalf of the Google Photos user.
   * The user must not own this album. (sharedAlbums.leave)
   *
   * @param LeaveSharedAlbumRequest $postBody
   * @param array $optParams Optional parameters.
   * @return LeaveSharedAlbumResponse
   */
  public function leave(LeaveSharedAlbumRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('leave', [$params], LeaveSharedAlbumResponse::class);
  }
  /**
   * Lists all shared albums available in the Sharing tab of the user's Google
   * Photos app. (sharedAlbums.listSharedAlbums)
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
   * in the response to the `listSharedAlbums` request.
   * @return ListSharedAlbumsResponse
   */
  public function listSharedAlbums($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListSharedAlbumsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SharedAlbums::class, 'Google_Service_PhotosLibrary_Resource_SharedAlbums');
