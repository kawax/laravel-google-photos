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

class ContentFilter extends \Google\Collection
{
  protected $collection_key = 'includedContentCategories';
  /**
   * @var string[]
   */
  public $excludedContentCategories;
  /**
   * @var string[]
   */
  public $includedContentCategories;

  /**
   * @param string[]
   */
  public function setExcludedContentCategories($excludedContentCategories)
  {
    $this->excludedContentCategories = $excludedContentCategories;
  }
  /**
   * @return string[]
   */
  public function getExcludedContentCategories()
  {
    return $this->excludedContentCategories;
  }
  /**
   * @param string[]
   */
  public function setIncludedContentCategories($includedContentCategories)
  {
    $this->includedContentCategories = $includedContentCategories;
  }
  /**
   * @return string[]
   */
  public function getIncludedContentCategories()
  {
    return $this->includedContentCategories;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContentFilter::class, 'Google_Service_PhotosLibrary_ContentFilter');
