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

class AddEnrichmentToAlbumResponse extends \Google\Model
{
  protected $enrichmentItemType = EnrichmentItem::class;
  protected $enrichmentItemDataType = '';

  /**
   * @param EnrichmentItem
   */
  public function setEnrichmentItem(EnrichmentItem $enrichmentItem)
  {
    $this->enrichmentItem = $enrichmentItem;
  }
  /**
   * @return EnrichmentItem
   */
  public function getEnrichmentItem()
  {
    return $this->enrichmentItem;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddEnrichmentToAlbumResponse::class, 'Google_Service_PhotosLibrary_AddEnrichmentToAlbumResponse');
