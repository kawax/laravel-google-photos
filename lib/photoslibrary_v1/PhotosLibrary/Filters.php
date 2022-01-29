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

class Filters extends \Google\Model
{
  protected $contentFilterType = ContentFilter::class;
  protected $contentFilterDataType = '';
  protected $dateFilterType = DateFilter::class;
  protected $dateFilterDataType = '';
  /**
   * @var bool
   */
  public $excludeNonAppCreatedData;
  protected $featureFilterType = FeatureFilter::class;
  protected $featureFilterDataType = '';
  /**
   * @var bool
   */
  public $includeArchivedMedia;
  protected $mediaTypeFilterType = MediaTypeFilter::class;
  protected $mediaTypeFilterDataType = '';

  /**
   * @param ContentFilter
   */
  public function setContentFilter(ContentFilter $contentFilter)
  {
    $this->contentFilter = $contentFilter;
  }
  /**
   * @return ContentFilter
   */
  public function getContentFilter()
  {
    return $this->contentFilter;
  }
  /**
   * @param DateFilter
   */
  public function setDateFilter(DateFilter $dateFilter)
  {
    $this->dateFilter = $dateFilter;
  }
  /**
   * @return DateFilter
   */
  public function getDateFilter()
  {
    return $this->dateFilter;
  }
  /**
   * @param bool
   */
  public function setExcludeNonAppCreatedData($excludeNonAppCreatedData)
  {
    $this->excludeNonAppCreatedData = $excludeNonAppCreatedData;
  }
  /**
   * @return bool
   */
  public function getExcludeNonAppCreatedData()
  {
    return $this->excludeNonAppCreatedData;
  }
  /**
   * @param FeatureFilter
   */
  public function setFeatureFilter(FeatureFilter $featureFilter)
  {
    $this->featureFilter = $featureFilter;
  }
  /**
   * @return FeatureFilter
   */
  public function getFeatureFilter()
  {
    return $this->featureFilter;
  }
  /**
   * @param bool
   */
  public function setIncludeArchivedMedia($includeArchivedMedia)
  {
    $this->includeArchivedMedia = $includeArchivedMedia;
  }
  /**
   * @return bool
   */
  public function getIncludeArchivedMedia()
  {
    return $this->includeArchivedMedia;
  }
  /**
   * @param MediaTypeFilter
   */
  public function setMediaTypeFilter(MediaTypeFilter $mediaTypeFilter)
  {
    $this->mediaTypeFilter = $mediaTypeFilter;
  }
  /**
   * @return MediaTypeFilter
   */
  public function getMediaTypeFilter()
  {
    return $this->mediaTypeFilter;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Filters::class, 'Google_Service_PhotosLibrary_Filters');
