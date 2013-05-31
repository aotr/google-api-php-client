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

/**
 * A class to contain the library configuration for the Google API client.
 */
class Google_Config {
  private $configuration;
  
  /**
   * Create a new Google_Config. Can accept an ini file location with the 
   * local configuration. For example: 
   *     application_name: "My App";
   *
   * @param [$ini_file_location] The location of the ini file to load     
   */
  public function __construct($ini_file_location = null) {
    $this->configuration = array(
      // The application_name is included in the User-Agent HTTP header.
      'application_name' => '',
      
      // Which Authentication, Storage and HTTP IO classes to use.
      'auth_class'    => 'Google_Auth_OAuth2',
      'io_class'      => 'Google_IO_Curl',
      'cache_class'   => 'Google_Cache_File',

      // Don't change these unless you're working against a special development 
      // or testing environment.
      'base_path' => 'https://www.googleapis.com',

      // Definition of class specific values, like file paths and so on. 
      'classes' => array(
        // If you want to pass in OAuth 2.0 settings, they will need to be
        // structured like this.
        'Google_Auth_OAuth2' => array(
          // Keys for OAuth 2.0 access, see the API console at 
          // https://developers.google.com/console
          'client_id' => '',
          'client_secret' => '',
          'redirect_uri' => '',
          
          // Simple API access key, also from the API console. Ensure you get
          // a Server key, and not a Browser key.
          'developer_key' => '',
          
          // Other parameters.
          'access_type' => 'online',
          'approval_prompt' => 'auto',
        ),
        // Set a default directory for the file cache.
        'Google_Cache_File' => array(
          'directory' => sys_get_temp_dir() . '/Google_Client'
        )
      ),

      // Definition of service specific values like scopes, oauth token URLs, 
      // etc. Example: 
      'services' => array(
      ),
    );
    if($ini_file_location) {
      $ini = parse_ini_file($location);
      if(is_array($ini) && count($ini)) {
        $this->configuration = array_merge($this->configuration, $ini);
      } 
    }
  }
  
  /**
   * Set configuration specific to the given service. 
   * $config->setServiceConfig('moderator', 
   *  array('scope' => 'https://www.googleapis.com/auth/moderator'));
   * @param $service the string of the service to set config for
   * @param $config an array of the configuration values
   */
  public function setServiceConfig($service, $config) {
    $this->configuration['services'][$service] = $config;
  }
  
  /**
   * Return an array with any configuration for the service.
   * @param $service string name of the service
   * @return array
   */
  public function getServiceConfig($service) {
    return isset($this->configuration['services'][$service]) ?
      $this->configuration['services'][$service] : array();
  }
  
  /**
   * Set configuration specific to a given class. 
   * $config->setClassConfig('Google_Cache_File', 
   *   array('directory' => '/tmp/cache'));
   * @param $class The class name for the configuration
   * @param $config an array of configuration values
   */
  public function setClassConfig($class, $config) {
    $this->configuration['classes'][$class] = $config;
  }
  
  /**
   * Return the configured cache class. 
   * @return Google_Cache_Abstract
   */
  public function getDefaultCache() {
    return $this->buildClass('cache_class');
  }
  
  /**
   * Return the configured Auth class. 
   * @return Google_Auth_Abstract
   */
  public function getDefaultAuth($io) {
    return $this->buildClass('auth_class', $io);
  }
  
  /**
   * Return the configured IO class. 
   * @return Google_IO_Abstract
   */
  public function getDefaultIo($cache) {
    return $this->buildClass('io_class', $cache);
  }
  
  /**
   * Set the application name, this is included in the User-Agent HTTP header.
   * @param string $name
   */
  public function setApplicationName($name) {
    $this->configuration['application_name'] = $name;
  }
  
  /**
   * @return string the name of the application
   */
  public function getApplicationName() {
    return $this->configuration['application_name'];
  }

  /**
   * Set the client ID for the auth class.
   * @param $key string - the API console client ID
   */
  public function setClientId($clientId) {
    $this->setAuthConfig('client_id', $clientId);
  }
  
  /**
   * Set the client secret for the auth class.
   * @param $key string - the API console client secret
   */
  public function setClientSecret($secret) {
    $this->setAuthConfig('client_secret', $secret);
  }
  
  /**
   * Set the redirect uri for the auth class. Note that if using the 
   * Javascript based sign in flow, this should be the string 'postmessage'.
   * @param $key string - the URI that users should be redirected to
   */
  public function setRedirectUri($uri) {
    $this->setAuthConfig('redirect_uri', $uri);
  }
  
  /**
   * Set the app activities for the auth class.
   * @param $rva string a space separated list of app activity types
   */
  public function setRequestVisibleActions($rva) {
    $this->setAuthConfig('request_visible_actions', $rva);
  }
  
  /**
   * Set the developer key for the auth class. Note that this is separate value
   * from the client ID - if it looks like a URL, its a client ID!
   * @param $key string - the API console developer key
   */
  public function setDeveloperKey($key) {
    $this->setAuthConfig('developer_key', $key);
  }
  
  /**
   * @return string the base URL to use for API calls
   */
  public function getBasePath() {
    return $this->configuration['base_path'];
  }
   
  /**
   * Convenience function to set the current auth class config.
   */
  private function setAuthConfig($key, $value) {
    $class = $this->configuration['auth_class'];
    if (!isset($this->configuration['classes'][$class])) {
      $this->configuration['classes'][$class] = array();
    }
    $this->configuration['classes'][$class][$key] = $value;
  }
  
  /**
   * TODO(ianbarber): This all seems a bit messy, the separation of concerns
   * between the client and the auth class is basically a mess.
   */
  public function getAuthConfig() {
    $class = $this->configuration['auth_class'];
    return $this->configuration['classes'][$class];
  }
  
  /**
   * Generate a new class based on the configuration, and pass through any
   * configuration stored here.
   */
  private function buildClass($key, $arg = null) {
    $class = $this->configuration[$key];
    $config = isset($this->configuration['classes'][$class]) ? 
      $this->configuration['classes'][$class] : null;
    if (isset($arg)) {
      return new $class($arg, $config);
    }
    return new $class($config);
  }
}