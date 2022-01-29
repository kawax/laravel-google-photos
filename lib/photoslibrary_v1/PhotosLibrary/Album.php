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

class Album extends \Google\Model
{
  /**
   * @var string
   */
  public $coverPhotoBaseUrl;
  /**
   * @var string
   */
  public $coverPhotoMediaItemId;
  /**
   * @var string
   */
  public $id;
  /**
   * @var bool
   */
  public $isWriteable;
  /**
   * @var string
   */
  public $mediaItemsCount;
  /**
   * @var string
   */
  public $productUrl;
  protected $shareInfoType = ShareInfo::class;
  protected $shareInfoDataType = '';
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setCoverPhotoBaseUrl($coverPhotoBaseUrl)
  {
    $this->coverPhotoBaseUrl = $coverPhotoBaseUrl;
  }
  /**
   * @return string
   */
  public function getCoverPhotoBaseUrl()
  {
    return $this->coverPhotoBaseUrl;
  }
  /**
   * @param string
   */
  public function setCoverPhotoMediaItemId($coverPhotoMediaItemId)
  {
    $this->coverPhotoMediaItemId = $coverPhotoMediaItemId;
  }
  /**
   * @return string
   */
  public function getCoverPhotoMediaItemId()
  {
    return $this->coverPhotoMediaItemId;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param bool
   */
  public function setIsWriteable($isWriteable)
  {
    $this->isWriteable = $isWriteable;
  }
  /**
   * @return bool
   */
  public function getIsWriteable()
  {
    return $this->isWriteable;
  }
  /**
   * @param string
   */
  public function setMediaItemsCount($mediaItemsCount)
  {
    $this->mediaItemsCount = $mediaItemsCount;
  }
  /**
   * @return string
   */
  public function getMediaItemsCount()
  {
    return $this->mediaItemsCount;
  }
  /**
   * @param string
   */
  public function setProductUrl($productUrl)
  {
    $this->productUrl = $productUrl;
  }
  /**
   * @return string
   */
  public function getProductUrl()
  {
    return $this->productUrl;
  }
  /**
   * @param ShareInfo
   */
  public function setShareInfo(ShareInfo $shareInfo)
  {
    $this->shareInfo = $shareInfo;
  }
  /**
   * @return ShareInfo
   */
  public function getShareInfo()
  {
    return $this->shareInfo;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Album::class, 'Google_Service_PhotosLibrary_Album');
