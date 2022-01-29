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

class AddEnrichmentToAlbumRequest extends \Google\Model
{
  protected $albumPositionType = AlbumPosition::class;
  protected $albumPositionDataType = '';
  protected $newEnrichmentItemType = NewEnrichmentItem::class;
  protected $newEnrichmentItemDataType = '';

  /**
   * @param AlbumPosition
   */
  public function setAlbumPosition(AlbumPosition $albumPosition)
  {
    $this->albumPosition = $albumPosition;
  }
  /**
   * @return AlbumPosition
   */
  public function getAlbumPosition()
  {
    return $this->albumPosition;
  }
  /**
   * @param NewEnrichmentItem
   */
  public function setNewEnrichmentItem(NewEnrichmentItem $newEnrichmentItem)
  {
    $this->newEnrichmentItem = $newEnrichmentItem;
  }
  /**
   * @return NewEnrichmentItem
   */
  public function getNewEnrichmentItem()
  {
    return $this->newEnrichmentItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddEnrichmentToAlbumRequest::class, 'Google_Service_PhotosLibrary_AddEnrichmentToAlbumRequest');
