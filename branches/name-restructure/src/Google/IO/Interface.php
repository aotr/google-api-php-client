<?php
/**
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once 'Google/Http/Request.php';

/**
 * IO class interface
 *
 * @author Chris Chabot <chabotc@google.com>
 */
interface Google_IO_Interface {
  public function __construct(Google_Cache_Abstract $cache, $config = null);
  
  /**
   * Executes a Google_Http_Request and returns the resulting populated Google_Http_Request
   * @param Google_Http_Request $request
   * @return Google_Http_Request $request
   */
  public function makeRequest(Google_Http_Request $request);

  /**
   * Set options that update the transport implementation's behavior.
   * @param $options
   */
  public function setOptions($options);

}
