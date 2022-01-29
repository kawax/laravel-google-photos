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

class SearchMediaItemsRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $albumId;
  protected $filtersType = Filters::class;
  protected $filtersDataType = '';
  /**
   * @var string
   */
  public $orderBy;
  /**
   * @var int
   */
  public $pageSize;
  /**
   * @var string
   */
  public $pageToken;

  /**
   * @param string
   */
  public function setAlbumId($albumId)
  {
    $this->albumId = $albumId;
  }
  /**
   * @return string
   */
  public function getAlbumId()
  {
    return $this->albumId;
  }
  /**
   * @param Filters
   */
  public function setFilters(Filters $filters)
  {
    $this->filters = $filters;
  }
  /**
   * @return Filters
   */
  public function getFilters()
  {
    return $this->filters;
  }
  /**
   * @param string
   */
  public function setOrderBy($orderBy)
  {
    $this->orderBy = $orderBy;
  }
  /**
   * @return string
   */
  public function getOrderBy()
  {
    return $this->orderBy;
  }
  /**
   * @param int
   */
  public function setPageSize($pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return int
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  /**
   * @param string
   */
  public function setPageToken($pageToken)
  {
    $this->pageToken = $pageToken;
  }
  /**
   * @return string
   */
  public function getPageToken()
  {
    return $this->pageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SearchMediaItemsRequest::class, 'Google_Service_PhotosLibrary_SearchMediaItemsRequest');
