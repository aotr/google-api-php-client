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

// Check for the required json and curl extensions, the Google APIs PHP Client
// won't function without them.
if (! function_exists('curl_init')) {
  throw new Exception('Google PHP API Client requires the CURL PHP extension');
}

if (! function_exists('json_decode')) {
  throw new Exception('Google PHP API Client requires the JSON PHP extension');
}

if (! function_exists('http_build_query')) {
  throw new Exception('Google PHP API Client requires http_build_query()');
}

if (! ini_get('date.timezone') && function_exists('date_default_timezone_set')) {
  date_default_timezone_set('UTC');
}

require_once 'Google/Auth/AssertionCredentials.php';
require_once 'Google/Cache/File.php';
require_once 'Google/Config.php';
require_once 'Google/Collection.php';
require_once 'Google/Exception.php';
require_once 'Google/IO/Curl.php';
require_once 'Google/Model.php';
require_once 'Google/Service.php';
require_once 'Google/Service/Resource.php';

/**
 * The Google API Client
 * http://code.google.com/p/google-api-php-client/
 *
 * @author Chris Chabot <chabotc@google.com>
 * @author Chirag Shah <chirags@google.com>
 */
class Google_Client {
  // TODO(ianbarber): Remove horrible hack for request.
  private static $client;
  /**
   * @var Google_Auth_Abstract $auth
   */
  private $auth;

  /**
   * @var Google_IO_Interface $io
   */
  private $io;

  /**
   * @var Google_Cache_Abstract $cache
   */
  private $cache;
  
  /**
   * @var Google_Config $config
   */
  private $config;

  /**
   * @var boolean $useBatch
   */
  private $useBatch = false;

  /** @var array $scopes */
  protected $scopes = array();

  // definitions of services that are discovered.
  protected $services = array();

  // Used to track authenticated state, can't discover services after doing authenticate()
  private $authenticated = false;

  public function __construct(Google_Config $config = null) {
    $this->config = $config ? $config : new Google_Config();
    $this->cache = $this->config->getDefaultCache();
    $this->io =  $this->config->getDefaultIo($this->cache);
    $this->auth = $this->config->getDefaultAuth($this->io);
    // TODO(ianbarber): Remove horrible hack for request.
    Google_Client::$client = $this;
  }

  /**
   * Add a service
   */
  public function addService($service, $version = false) {
    if ($this->authenticated) {
      throw new Google_Exception('Cant add services after having authenticated');
    }
    $this->services[$service] = $this->config->getServiceConfig($service);
  }

  public function authenticate($code = null) {
    $service = $this->prepareService();
    $this->authenticated = true;
    return self::$auth->authenticate($service, $code);
  }

  /**
   * @return array
   * @visible For Testing
   */
  public function prepareService() {
    $service = array();
    $scopes = array();
    if ($this->scopes) {
      $scopes = $this->scopes;
    } else {
      foreach ($this->services as $key => $val) {
        if (isset($val['scope'])) {
          if (is_array($val['scope'])) {
            $scopes = array_merge($val['scope'], $scopes);
          } else {
            $scopes[] = $val['scope'];
          }
        } else {
          $scopes[] = 'https://www.googleapis.com/auth/' . $key;
        }
        unset($val['discoveryURI']);
        unset($val['scope']);
        $service = array_merge($service, $val);
      }
    }
    $service['scope'] = implode(' ', $scopes);
    return $service;
  }

  /**
   * Set the OAuth 2.0 access token using the string that resulted from calling authenticate()
   * or Google_Client#getAccessToken().
   * @param string $accessToken JSON encoded string containing in the following format:
   * {"access_token":"TOKEN", "refresh_token":"TOKEN", "token_type":"Bearer",
   *  "expires_in":3600, "id_token":"TOKEN", "created":1320790426}
   */
  public function setAccessToken($accessToken) {
    if ($accessToken == null || 'null' == $accessToken) {
      $accessToken = null;
    }
    $this->auth->setAccessToken($accessToken);
  }

  /**
   * Set the authenticator object
   * @param string $auth
   */
  public function setAuth(Google_Auth_Abstract $auth) {
    $this->auth = $auth;
  }

  /**
   * Construct the OAuth 2.0 authorization request URI.
   * @return string
   */
  public function createAuthUrl() {
    $service = $this->prepareService();
    return $this->auth->createAuthUrl($service['scope']);
  }

  /**
   * Get the OAuth 2.0 access token.
   * @return string $accessToken JSON encoded string in the following format:
   * {"access_token":"TOKEN", "refresh_token":"TOKEN", "token_type":"Bearer",
   *  "expires_in":3600,"id_token":"TOKEN", "created":1320790426}
   */
  public function getAccessToken() {
    $token = $this->auth->getAccessToken();
    return (null == $token || 'null' == $token) ? null : $token;
  }

  /**
   * Returns if the access_token is expired.
   * @return bool Returns True if the access_token is expired.
   */
  public function isAccessTokenExpired() {
    return $this->auth->isAccessTokenExpired();
  }

  /**
   * Set OAuth 2.0 "state" parameter to achieve per-request customization.
   * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-22#section-3.1.2.2
   * @param string $state
   */
  public function setState($state) {
    $this->auth->setState($state);
  }

  /**
   * @param string $accessType Possible values for access_type include:
   *  {@code "offline"} to request offline access from the user. (This is the default value)
   *  {@code "online"} to request online access from the user.
   */
  public function setAccessType($accessType) {
    $this->auth->setAccessType($accessType);
  }

  /**
   * @param string $approvalPrompt Possible values for approval_prompt include:
   *  {@code "force"} to force the approval UI to appear. (This is the default value)
   *  {@code "auto"} to request auto-approval when possible.
   */
  public function setApprovalPrompt($approvalPrompt) {
    $this->auth->setApprovalPrompt($approvalPrompt);
  }

  /**
   * Set the application name, this is included in the User-Agent HTTP header.
   * @param string $applicationName
   */
  public function setApplicationName($applicationName) {
    $this->config->setApplicationName($applicationName);
  }

  /**
   * Set the OAuth 2.0 Client ID.
   * @param string $clientId
   */
  public function setClientId($clientId) {  
    $this->config->setClientId($clientId);
    $this->auth->updateConfig($this->config->getAuthConfig());
  }

  /**
   * Set the OAuth 2.0 Client Secret.
   * @param string $clientSecret
   */
  public function setClientSecret($clientSecret) {
    $this->config->setClientSecret($clientSecret);
    $this->auth->updateConfig($this->config->getAuthConfig());  }

  /**
   * Set the OAuth 2.0 Redirect URI.
   * @param string $redirectUri
   */
  public function setRedirectUri($redirectUri) {
    $this->config->setRedirectUri($redirectUri);
    $this->auth->updateConfig($this->config->getAuthConfig());  
  }
  
  /**
   * If 'plus.login' is included in the list of requested scopes, you can use
   * this method to define types of app activities that your app will write.
   * You can find a list of available types here:
   * @link https://developers.google.com/+/api/moment-types
   *
   * @param array $requestVisibleActions Array of app activity types
   */
  public function setRequestVisibleActions($requestVisibleActions) {
    $this->config->setRequestVisibleActions(join(" ", $requestVisibleActions));
    $this->auth->updateConfig($this->config->getAuthConfig());
  }
  
  /**
   * Set the developer key to use, these are obtained through the API Console.
   * @see http://code.google.com/apis/console-help/#generatingdevkeys
   * @param string $developerKey
   */
  public function setDeveloperKey($developerKey) {
    $this->config->setDeveloperKey($developerKey);
    $this->auth->updateConfig($this->config->getAuthConfig());
  }

  /**
   * Fetches a fresh OAuth 2.0 access token with the given refresh token.
   * @param string $refreshToken
   * @return void
   */
  public function refreshToken($refreshToken) {
    return $this->auth->refreshToken($refreshToken);
  }

  /**
   * Revoke an OAuth2 access token or refresh token. This method will revoke the current access
   * token, if a token isn't provided.
   * @throws Google_Auth_Exception
   * @param string|null $token The token (access token or a refresh token) that should be revoked.
   * @return boolean Returns True if the revocation was successful, otherwise False.
   */
  public function revokeToken($token = null) {
    return $this->auth->revokeToken($token);
  }

  /**
   * Verify an id_token. This method will verify the current id_token, if one
   * isn't provided.
   * @throws Google_Auth_Exception
   * @param string|null $token The token (id_token) that should be verified.
   * @return Google_Auth_LoginTicket Returns an apiLoginTicket if the verification was
   * successful.
   */
  public function verifyIdToken($token = null) {
    return $this->auth->verifyIdToken($token);
  }

  /**
   * @param Google_Auth_AssertionCredentials $creds
   * @return void
   */
  public function setAssertionCredentials(Google_Auth_AssertionCredentials $creds) {
    $this->auth->setAssertionCredentials($creds);
  }

  /**
   * This function allows you to overrule the automatically generated scopes,
   * so that you can ask for more or less permission in the auth flow
   * Set this before you call authenticate() though!
   * @param array $scopes, ie: array('https://www.googleapis.com/auth/plus.me', 'https://www.googleapis.com/auth/moderator')
   */
  public function setScopes($scopes) {
    $this->scopes = is_string($scopes) ? explode(" ", $scopes) : $scopes;
  }

  /**
   * Returns the list of scopes set on the client
   * @return array the list of scopes
   *
   */
  public function getScopes() {
     return $this->scopes;
  }

  /**
   * Declare whether batch calls should be used. This may increase throughput
   * by making multiple requests in one connection.
   *
   * @param boolean $useBatch True if the experimental batch support should
   * be enabled. Defaults to False.
   * @experimental
   */
  public function setUseBatch($useBatch) {
    $this->useBatch = $useBatch;
  }
  
  /**
   * Whether or not to batch requests.
   * @return boolean
   */
  public function shouldUseBatch() {
    return $this->useBatch;
  }

  /**
   * @return Google_Auth_Abstract Authentication implementation
   */
  public function getAuth() {
    return $this->auth;
  }

  /**
   * @return Google_IO_Interface IO implementation
   */
  public function getIo() {
    return $this->io;
  }

  /**
   * @return Google_Cache_Abstract Cache implementation
   */
  public function getCache() {
    return $this->cache;
  }
  
  /**
   * @return string the base URL to use for calls to the APIs
   */
  public function getBasePath() {
    return $this->config->getBasePath();
  }
  
  /**
   * @return string the name of the application
   */
  public function getApplicationName() {
    return $this->config->getApplicationName();
  }
  
  public static function getStaticBasePath() {
    return self::$client->getBasePath();
  }
  
  public static function getStaticAppName() {
    return self::$client->getApplicationName();
  }
}