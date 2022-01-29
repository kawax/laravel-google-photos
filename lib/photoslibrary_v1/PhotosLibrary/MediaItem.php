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

class MediaItem extends \Google\Model
{
  /**
   * @var string
   */
  public $baseUrl;
  protected $contributorInfoType = ContributorInfo::class;
  protected $contributorInfoDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $filename;
  /**
   * @var string
   */
  public $id;
  protected $mediaMetadataType = MediaMetadata::class;
  protected $mediaMetadataDataType = '';
  /**
   * @var string
   */
  public $mimeType;
  /**
   * @var string
   */
  public $productUrl;

  /**
   * @param string
   */
  public function setBaseUrl($baseUrl)
  {
    $this->baseUrl = $baseUrl;
  }
  /**
   * @return string
   */
  public function getBaseUrl()
  {
    return $this->baseUrl;
  }
  /**
   * @param ContributorInfo
   */
  public function setContributorInfo(ContributorInfo $contributorInfo)
  {
    $this->contributorInfo = $contributorInfo;
  }
  /**
   * @return ContributorInfo
   */
  public function getContributorInfo()
  {
    return $this->contributorInfo;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  /**
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
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
   * @param MediaMetadata
   */
  public function setMediaMetadata(MediaMetadata $mediaMetadata)
  {
    $this->mediaMetadata = $mediaMetadata;
  }
  /**
   * @return MediaMetadata
   */
  public function getMediaMetadata()
  {
    return $this->mediaMetadata;
  }
  /**
   * @param string
   */
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  /**
   * @return string
   */
  public function getMimeType()
  {
    return $this->mimeType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaItem::class, 'Google_Service_PhotosLibrary_MediaItem');
