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

class AlbumPosition extends \Google\Model
{
  /**
   * @var string
   */
  public $position;
  /**
   * @var string
   */
  public $relativeEnrichmentItemId;
  /**
   * @var string
   */
  public $relativeMediaItemId;

  /**
   * @param string
   */
  public function setPosition($position)
  {
    $this->position = $position;
  }
  /**
   * @return string
   */
  public function getPosition()
  {
    return $this->position;
  }
  /**
   * @param string
   */
  public function setRelativeEnrichmentItemId($relativeEnrichmentItemId)
  {
    $this->relativeEnrichmentItemId = $relativeEnrichmentItemId;
  }
  /**
   * @return string
   */
  public function getRelativeEnrichmentItemId()
  {
    return $this->relativeEnrichmentItemId;
  }
  /**
   * @param string
   */
  public function setRelativeMediaItemId($relativeMediaItemId)
  {
    $this->relativeMediaItemId = $relativeMediaItemId;
  }
  /**
   * @return string
   */
  public function getRelativeMediaItemId()
  {
    return $this->relativeMediaItemId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AlbumPosition::class, 'Google_Service_PhotosLibrary_AlbumPosition');
