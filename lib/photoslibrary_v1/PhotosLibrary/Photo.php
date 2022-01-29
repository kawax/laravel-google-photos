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

class Photo extends \Google\Model
{
  /**
   * @var float
   */
  public $apertureFNumber;
  /**
   * @var string
   */
  public $cameraMake;
  /**
   * @var string
   */
  public $cameraModel;
  /**
   * @var string
   */
  public $exposureTime;
  /**
   * @var float
   */
  public $focalLength;
  /**
   * @var int
   */
  public $isoEquivalent;

  /**
   * @param float
   */
  public function setApertureFNumber($apertureFNumber)
  {
    $this->apertureFNumber = $apertureFNumber;
  }
  /**
   * @return float
   */
  public function getApertureFNumber()
  {
    return $this->apertureFNumber;
  }
  /**
   * @param string
   */
  public function setCameraMake($cameraMake)
  {
    $this->cameraMake = $cameraMake;
  }
  /**
   * @return string
   */
  public function getCameraMake()
  {
    return $this->cameraMake;
  }
  /**
   * @param string
   */
  public function setCameraModel($cameraModel)
  {
    $this->cameraModel = $cameraModel;
  }
  /**
   * @return string
   */
  public function getCameraModel()
  {
    return $this->cameraModel;
  }
  /**
   * @param string
   */
  public function setExposureTime($exposureTime)
  {
    $this->exposureTime = $exposureTime;
  }
  /**
   * @return string
   */
  public function getExposureTime()
  {
    return $this->exposureTime;
  }
  /**
   * @param float
   */
  public function setFocalLength($focalLength)
  {
    $this->focalLength = $focalLength;
  }
  /**
   * @return float
   */
  public function getFocalLength()
  {
    return $this->focalLength;
  }
  /**
   * @param int
   */
  public function setIsoEquivalent($isoEquivalent)
  {
    $this->isoEquivalent = $isoEquivalent;
  }
  /**
   * @return int
   */
  public function getIsoEquivalent()
  {
    return $this->isoEquivalent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Photo::class, 'Google_Service_PhotosLibrary_Photo');
