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

namespace Google\Service\PhotosLibrary;

class NewMediaItemResult extends \Google\Model
{
  protected $mediaItemType = MediaItem::class;
  protected $mediaItemDataType = '';
  protected $statusType = Status::class;
  protected $statusDataType = '';
  /**
   * @var string
   */
  public $uploadToken;

  /**
   * @param MediaItem
   */
  public function setMediaItem(MediaItem $mediaItem)
  {
    $this->mediaItem = $mediaItem;
  }
  /**
   * @return MediaItem
   */
  public function getMediaItem()
  {
    return $this->mediaItem;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUploadToken($uploadToken)
  {
    $this->uploadToken = $uploadToken;
  }
  /**
   * @return string
   */
  public function getUploadToken()
  {
    return $this->uploadToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewMediaItemResult::class, 'Google_Service_PhotosLibrary_NewMediaItemResult');
