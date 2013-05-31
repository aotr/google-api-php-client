<?php
/*
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

require_once "Google/Auth/Abstract.php";
require_once "Google/Http/Request.php";

/**
 * Simple API access implementation. Can either be used to make requests 
 * completely unauthenticated, or by using a Simple API Access developer 
 * key.
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 */
class Google_Auth_Simple extends Google_Auth_Abstract {
  private $key = null;
  private $io;

  public function __construct(Google_IO_Abstract $io, $config = null) {
    $this->io = $io;
    $this->updateConfig($config); 
  }
  
  /**
   * Update the configuration with the data from the given array.
   */
  public function updateConfig($config) {
    if (is_array($config)) {
      $this->config = array_merge($this->config, $config);
    }
  }

  public function setDeveloperKey($key) {
    $this->key = $key;
  }
  
  /**
   * Perform an authenticated / signed apiHttpRequest.
   * This function takes the apiHttpRequest, calls apiAuth->sign on it
   * (which can modify the request in what ever way fits the auth mechanism)
   * and then calls apiCurlIO::makeRequest on the signed request
   *
   * @param Google_Http_Request $request
   * @return Google_Http_Request The resulting HTTP response including the
   * responseHttpCode, responseHeaders and responseBody.
   */
  public function authenticatedRequest(Google_Http_Request $request) {
    $request = $this->sign($request);
    return $this->io->makeRequest($request);
  }
  
  public function authenticate($service) {/*noop*/}
  public function setAccessToken($accessToken) {/* noop*/}
  public function getAccessToken() {return null;}
  public function createAuthUrl($scope) {return null;}
  public function refreshToken($refreshToken) {/* noop*/}
  public function revokeToken() {/* noop*/}

  public function sign(Google_Http_Request $request) {
    if ($this->key) {
      $request->setUrl($request->getUrl() . ((strpos($request->getUrl(), '?') === false) ? '?' : '&')
          . 'key='.urlencode($this->key));
    }
    return $request;
  }
}
