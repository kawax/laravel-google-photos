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

class SharedAlbumOptions extends \Google\Model
{
  /**
   * @var bool
   */
  public $isCollaborative;
  /**
   * @var bool
   */
  public $isCommentable;

  /**
   * @param bool
   */
  public function setIsCollaborative($isCollaborative)
  {
    $this->isCollaborative = $isCollaborative;
  }
  /**
   * @return bool
   */
  public function getIsCollaborative()
  {
    return $this->isCollaborative;
  }
  /**
   * @param bool
   */
  public function setIsCommentable($isCommentable)
  {
    $this->isCommentable = $isCommentable;
  }
  /**
   * @return bool
   */
  public function getIsCommentable()
  {
    return $this->isCommentable;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SharedAlbumOptions::class, 'Google_Service_PhotosLibrary_SharedAlbumOptions');
