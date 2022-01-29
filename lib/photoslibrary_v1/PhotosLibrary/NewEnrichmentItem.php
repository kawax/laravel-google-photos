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

class NewEnrichmentItem extends \Google\Model
{
  protected $locationEnrichmentType = LocationEnrichment::class;
  protected $locationEnrichmentDataType = '';
  protected $mapEnrichmentType = MapEnrichment::class;
  protected $mapEnrichmentDataType = '';
  protected $textEnrichmentType = TextEnrichment::class;
  protected $textEnrichmentDataType = '';

  /**
   * @param LocationEnrichment
   */
  public function setLocationEnrichment(LocationEnrichment $locationEnrichment)
  {
    $this->locationEnrichment = $locationEnrichment;
  }
  /**
   * @return LocationEnrichment
   */
  public function getLocationEnrichment()
  {
    return $this->locationEnrichment;
  }
  /**
   * @param MapEnrichment
   */
  public function setMapEnrichment(MapEnrichment $mapEnrichment)
  {
    $this->mapEnrichment = $mapEnrichment;
  }
  /**
   * @return MapEnrichment
   */
  public function getMapEnrichment()
  {
    return $this->mapEnrichment;
  }
  /**
   * @param TextEnrichment
   */
  public function setTextEnrichment(TextEnrichment $textEnrichment)
  {
    $this->textEnrichment = $textEnrichment;
  }
  /**
   * @return TextEnrichment
   */
  public function getTextEnrichment()
  {
    return $this->textEnrichment;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NewEnrichmentItem::class, 'Google_Service_PhotosLibrary_NewEnrichmentItem');
