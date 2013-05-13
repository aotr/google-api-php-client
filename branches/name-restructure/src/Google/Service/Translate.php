<?php
/*
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

/**
 * Service definition for Translate (v2).
 *
 * <p>
 * Lets you translate text from one language to another
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="http://code.google.com/apis/language/translate/v2/using_rest.html" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Translate extends Google_Service {
  public $detections;
  public $languages;
  public $translations;
  /**
   * Constructs the internal representation of the Translate service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client) {
    $this->servicePath = 'language/translate/';
    $this->version = 'v2';
    $this->serviceName = 'translate';

    $client->addService($this->serviceName, $this->version);
    $this->detections = new Google_Service_Translate_Detections_Resource($this, $this->serviceName, 'detections', json_decode('{"methods": {"list": {"id": "language.detections.list", "path": "v2/detect", "httpMethod": "GET", "parameters": {"q": {"type": "string", "required": true, "repeated": true, "location": "query"}}, "response": {"$ref": "DetectionsListResponse"}}}}', true));
    $this->languages = new Google_Service_Translate_Languages_Resource($this, $this->serviceName, 'languages', json_decode('{"methods": {"list": {"id": "language.languages.list", "path": "v2/languages", "httpMethod": "GET", "parameters": {"target": {"type": "string", "location": "query"}}, "response": {"$ref": "LanguagesListResponse"}}}}', true));
    $this->translations = new Google_Service_Translate_Translations_Resource($this, $this->serviceName, 'translations', json_decode('{"methods": {"list": {"id": "language.translations.list", "path": "v2", "httpMethod": "GET", "parameters": {"cid": {"type": "string", "repeated": true, "location": "query"}, "format": {"type": "string", "enum": ["html", "text"], "location": "query"}, "q": {"type": "string", "required": true, "repeated": true, "location": "query"}, "source": {"type": "string", "location": "query"}, "target": {"type": "string", "required": true, "location": "query"}}, "response": {"$ref": "TranslationsListResponse"}}}}', true));

  }
}


  /**
   * The "detections" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new Google_TranslateService(...);
   *   $detections = $translateService->detections;
   *  </code>
   */
  class Google_Service_Translate_Detections_Resource extends Google_Service_Resource {


    /**
     * Detect the language of text. (detections.list)
     *
     * @param string $q The text to detect
     * @param array $optParams Optional parameters.
     * @return Google_Service_Translate_DetectionsListResponse
     */
    public function listDetections($q, $optParams = array()) {
      $params = array('q' => $q);
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Translate_DetectionsListResponse($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "languages" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new Google_TranslateService(...);
   *   $languages = $translateService->languages;
   *  </code>
   */
  class Google_Service_Translate_Languages_Resource extends Google_Service_Resource {


    /**
     * List the source/target languages supported by the API (languages.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string target the language and collation in which the localized results should be returned
     * @return Google_Service_Translate_LanguagesListResponse
     */
    public function listLanguages($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Translate_LanguagesListResponse($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "translations" collection of methods.
   * Typical usage is:
   *  <code>
   *   $translateService = new Google_TranslateService(...);
   *   $translations = $translateService->translations;
   *  </code>
   */
  class Google_Service_Translate_Translations_Resource extends Google_Service_Resource {


    /**
     * Returns text translations from one language to another. (translations.list)
     *
     * @param string $q The text to translate
     * @param string $target The target language into which the text should be translated
     * @param array $optParams Optional parameters.
     *
     * @opt_param string cid The customization id for translate
     * @opt_param string format The format of the text
     * @opt_param string source The source language of the text
     * @return Google_Service_Translate_TranslationsListResponse
     */
    public function listTranslations($q, $target, $optParams = array()) {
      $params = array('q' => $q, 'target' => $target);
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Translate_TranslationsListResponse($data);
      } else {
        return $data;
      }
    }
  }




class Google_Service_Translate_DetectionsListResponse
    extends Google_Collection {
  protected $__detectionsType = 'Google_Service_Translate_DetectionsResourceItems';
  protected $__detectionsDataType = 'array';
  public $detections;
  public function setDetections($detections) {
    $this->detections = $detections;
  }
  public function getDetections() {
    return $this->detections;
  }
}

class Google_Service_Translate_DetectionsResourceItems
    extends Google_Model {
  public $confidence;
  public $isReliable;
  public $language;
  public function setConfidence($confidence) {
    $this->confidence = $confidence;
  }
  public function getConfidence() {
    return $this->confidence;
  }
  public function setIsReliable($isReliable) {
    $this->isReliable = $isReliable;
  }
  public function getIsReliable() {
    return $this->isReliable;
  }
  public function setLanguage($language) {
    $this->language = $language;
  }
  public function getLanguage() {
    return $this->language;
  }
}

class Google_Service_Translate_LanguagesListResponse
    extends Google_Collection {
  protected $__languagesType = 'Google_Service_Translate_LanguagesResource';
  protected $__languagesDataType = 'array';
  public $languages;
  public function setLanguages($languages) {
    $this->languages = $languages;
  }
  public function getLanguages() {
    return $this->languages;
  }
}

class Google_Service_Translate_LanguagesResource
    extends Google_Model {
  public $language;
  public $name;
  public function setLanguage($language) {
    $this->language = $language;
  }
  public function getLanguage() {
    return $this->language;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getName() {
    return $this->name;
  }
}

class Google_Service_Translate_TranslationsListResponse
    extends Google_Collection {
  protected $__translationsType = 'Google_Service_Translate_TranslationsResource';
  protected $__translationsDataType = 'array';
  public $translations;
  public function setTranslations($translations) {
    $this->translations = $translations;
  }
  public function getTranslations() {
    return $this->translations;
  }
}

class Google_Service_Translate_TranslationsResource
    extends Google_Model {
  public $detectedSourceLanguage;
  public $translatedText;
  public function setDetectedSourceLanguage($detectedSourceLanguage) {
    $this->detectedSourceLanguage = $detectedSourceLanguage;
  }
  public function getDetectedSourceLanguage() {
    return $this->detectedSourceLanguage;
  }
  public function setTranslatedText($translatedText) {
    $this->translatedText = $translatedText;
  }
  public function getTranslatedText() {
    return $this->translatedText;
  }
}
