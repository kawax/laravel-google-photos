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

class ShareInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $isJoinable;
  /**
   * @var bool
   */
  public $isJoined;
  /**
   * @var bool
   */
  public $isOwned;
  /**
   * @var string
   */
  public $shareToken;
  /**
   * @var string
   */
  public $shareableUrl;
  protected $sharedAlbumOptionsType = SharedAlbumOptions::class;
  protected $sharedAlbumOptionsDataType = '';

  /**
   * @param bool
   */
  public function setIsJoinable($isJoinable)
  {
    $this->isJoinable = $isJoinable;
  }
  /**
   * @return bool
   */
  public function getIsJoinable()
  {
    return $this->isJoinable;
  }
  /**
   * @param bool
   */
  public function setIsJoined($isJoined)
  {
    $this->isJoined = $isJoined;
  }
  /**
   * @return bool
   */
  public function getIsJoined()
  {
    return $this->isJoined;
  }
  /**
   * @param bool
   */
  public function setIsOwned($isOwned)
  {
    $this->isOwned = $isOwned;
  }
  /**
   * @return bool
   */
  public function getIsOwned()
  {
    return $this->isOwned;
  }
  /**
   * @param string
   */
  public function setShareToken($shareToken)
  {
    $this->shareToken = $shareToken;
  }
  /**
   * @return string
   */
  public function getShareToken()
  {
    return $this->shareToken;
  }
  /**
   * @param string
   */
  public function setShareableUrl($shareableUrl)
  {
    $this->shareableUrl = $shareableUrl;
  }
  /**
   * @return string
   */
  public function getShareableUrl()
  {
    return $this->shareableUrl;
  }
  /**
   * @param SharedAlbumOptions
   */
  public function setSharedAlbumOptions(SharedAlbumOptions $sharedAlbumOptions)
  {
    $this->sharedAlbumOptions = $sharedAlbumOptions;
  }
  /**
   * @return SharedAlbumOptions
   */
  public function getSharedAlbumOptions()
  {
    return $this->sharedAlbumOptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ShareInfo::class, 'Google_Service_PhotosLibrary_ShareInfo');
