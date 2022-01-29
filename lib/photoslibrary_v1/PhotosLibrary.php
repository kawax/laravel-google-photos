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

namespace Google\Service;

use Google\Client;

/**
 * Service definition for PhotosLibrary (v1).
 *
 * <p>
 * Manage photos, videos, and albums in Google Photos</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/photos/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class PhotosLibrary extends \Google\Service
{
  /** See, upload, and organize items in your Google Photos library. */
  const PHOTOSLIBRARY =
      "https://www.googleapis.com/auth/photoslibrary";
  /** Add to your Google Photos library. */
  const PHOTOSLIBRARY_APPENDONLY =
      "https://www.googleapis.com/auth/photoslibrary.appendonly";
  /** Edit the info in your photos, videos, and albums created within this app, including titles, descriptions, and covers. */
  const PHOTOSLIBRARY_EDIT_APPCREATEDDATA =
      "https://www.googleapis.com/auth/photoslibrary.edit.appcreateddata";
  /** View your Google Photos library. */
  const PHOTOSLIBRARY_READONLY =
      "https://www.googleapis.com/auth/photoslibrary.readonly";
  /** Manage photos added by this app. */
  const PHOTOSLIBRARY_READONLY_APPCREATEDDATA =
      "https://www.googleapis.com/auth/photoslibrary.readonly.appcreateddata";
  /** Manage and add to shared albums on your behalf. */
  const PHOTOSLIBRARY_SHARING =
      "https://www.googleapis.com/auth/photoslibrary.sharing";

  public $albums;
  public $mediaItems;
  public $sharedAlbums;

  /**
   * Constructs the internal representation of the PhotosLibrary service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://photoslibrary.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'photoslibrary';

    $this->albums = new PhotosLibrary\Resource\Albums(
        $this,
        $this->serviceName,
        'albums',
        [
          'methods' => [
            'addEnrichment' => [
              'path' => 'v1/albums/{+albumId}:addEnrichment',
              'httpMethod' => 'POST',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchAddMediaItems' => [
              'path' => 'v1/albums/{+albumId}:batchAddMediaItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'batchRemoveMediaItems' => [
              'path' => 'v1/albums/{+albumId}:batchRemoveMediaItems',
              'httpMethod' => 'POST',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'create' => [
              'path' => 'v1/albums',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'get' => [
              'path' => 'v1/albums/{+albumId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/albums',
              'httpMethod' => 'GET',
              'parameters' => [
                'excludeNonAppCreatedData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/albums/{+id}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'share' => [
              'path' => 'v1/albums/{+albumId}:share',
              'httpMethod' => 'POST',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'unshare' => [
              'path' => 'v1/albums/{+albumId}:unshare',
              'httpMethod' => 'POST',
              'parameters' => [
                'albumId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],
          ]
        ]
    );
    $this->mediaItems = new PhotosLibrary\Resource\MediaItems(
        $this,
        $this->serviceName,
        'mediaItems',
        [
          'methods' => [
            'batchCreate' => [
              'path' => 'v1/mediaItems:batchCreate',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'batchGet' => [
              'path' => 'v1/mediaItems:batchGet',
              'httpMethod' => 'GET',
              'parameters' => [
                'mediaItemIds' => [
                  'location' => 'query',
                  'type' => 'string',
                  'repeated' => true,
                ],
              ],
            ],'get' => [
              'path' => 'v1/mediaItems/{+mediaItemId}',
              'httpMethod' => 'GET',
              'parameters' => [
                'mediaItemId' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'list' => [
              'path' => 'v1/mediaItems',
              'httpMethod' => 'GET',
              'parameters' => [
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'patch' => [
              'path' => 'v1/mediaItems/{+id}',
              'httpMethod' => 'PATCH',
              'parameters' => [
                'id' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
                'updateMask' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],'search' => [
              'path' => 'v1/mediaItems:search',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
    $this->sharedAlbums = new PhotosLibrary\Resource\SharedAlbums(
        $this,
        $this->serviceName,
        'sharedAlbums',
        [
          'methods' => [
            'get' => [
              'path' => 'v1/sharedAlbums/{+shareToken}',
              'httpMethod' => 'GET',
              'parameters' => [
                'shareToken' => [
                  'location' => 'path',
                  'type' => 'string',
                  'required' => true,
                ],
              ],
            ],'join' => [
              'path' => 'v1/sharedAlbums:join',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'leave' => [
              'path' => 'v1/sharedAlbums:leave',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'list' => [
              'path' => 'v1/sharedAlbums',
              'httpMethod' => 'GET',
              'parameters' => [
                'excludeNonAppCreatedData' => [
                  'location' => 'query',
                  'type' => 'boolean',
                ],
                'pageSize' => [
                  'location' => 'query',
                  'type' => 'integer',
                ],
                'pageToken' => [
                  'location' => 'query',
                  'type' => 'string',
                ],
              ],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PhotosLibrary::class, 'Google_Service_PhotosLibrary');
