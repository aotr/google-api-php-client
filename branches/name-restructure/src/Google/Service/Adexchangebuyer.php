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
 * Service definition for Adexchangebuyer (v1.2).
 *
 * <p>
 * Lets you manage your Ad Exchange Buyer account.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="https://developers.google.com/ad-exchange/buyer-rest" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Adexchangebuyer extends Google_Service {
  public $accounts;
  public $creatives;
  public $directDeals;
  /**
   * Constructs the internal representation of the Adexchangebuyer service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client) {
    $this->servicePath = 'adexchangebuyer/v1.2/';
    $this->version = 'v1.2';
    $this->serviceName = 'adexchangebuyer';

    $client->addService($this->serviceName, $this->version);
    $this->accounts = new Google_Service_Adexchangebuyer_Accounts_Resource($this, $this->serviceName, 'accounts', json_decode('{"methods": {"get": {"id": "adexchangebuyer.accounts.get", "path": "accounts/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "integer", "required": true, "format": "int32", "location": "path"}}, "response": {"$ref": "Account"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "list": {"id": "adexchangebuyer.accounts.list", "path": "accounts", "httpMethod": "GET", "response": {"$ref": "AccountsList"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "patch": {"id": "adexchangebuyer.accounts.patch", "path": "accounts/{id}", "httpMethod": "PATCH", "parameters": {"id": {"type": "integer", "required": true, "format": "int32", "location": "path"}}, "request": {"$ref": "Account"}, "response": {"$ref": "Account"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "update": {"id": "adexchangebuyer.accounts.update", "path": "accounts/{id}", "httpMethod": "PUT", "parameters": {"id": {"type": "integer", "required": true, "format": "int32", "location": "path"}}, "request": {"$ref": "Account"}, "response": {"$ref": "Account"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}}}', true));
    $this->creatives = new Google_Service_Adexchangebuyer_Creatives_Resource($this, $this->serviceName, 'creatives', json_decode('{"methods": {"get": {"id": "adexchangebuyer.creatives.get", "path": "creatives/{accountId}/{buyerCreativeId}", "httpMethod": "GET", "parameters": {"accountId": {"type": "integer", "required": true, "format": "int32", "location": "path"}, "buyerCreativeId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Creative"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "insert": {"id": "adexchangebuyer.creatives.insert", "path": "creatives", "httpMethod": "POST", "request": {"$ref": "Creative"}, "response": {"$ref": "Creative"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "list": {"id": "adexchangebuyer.creatives.list", "path": "creatives", "httpMethod": "GET", "parameters": {"maxResults": {"type": "integer", "format": "uint32", "minimum": "1", "maximum": "1000", "location": "query"}, "pageToken": {"type": "string", "location": "query"}, "statusFilter": {"type": "string", "enum": ["approved", "disapproved", "not_checked"], "location": "query"}}, "response": {"$ref": "CreativesList"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}}}', true));
    $this->directDeals = new Google_Service_Adexchangebuyer_DirectDeals_Resource($this, $this->serviceName, 'directDeals', json_decode('{"methods": {"get": {"id": "adexchangebuyer.directDeals.get", "path": "directdeals/{id}", "httpMethod": "GET", "parameters": {"id": {"type": "string", "required": true, "format": "int64", "location": "path"}}, "response": {"$ref": "DirectDeal"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}, "list": {"id": "adexchangebuyer.directDeals.list", "path": "directdeals", "httpMethod": "GET", "response": {"$ref": "DirectDealsList"}, "scopes": ["https://www.googleapis.com/auth/adexchange.buyer"]}}}', true));

  }
}


  /**
   * The "accounts" collection of methods.
   * Typical usage is:
   *  <code>
   *   $adexchangebuyerService = new Google_AdexchangebuyerService(...);
   *   $accounts = $adexchangebuyerService->accounts;
   *  </code>
   */
  class Google_Service_Adexchangebuyer_Accounts_Resource extends Google_Service_Resource {


    /**
     * Gets one account by ID. (accounts.get)
     *
     * @param int $id The account id
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_Account
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_Account($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves the authenticated user's list of accounts. (accounts.list)
     *
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_AccountsList
     */
    public function listAccounts($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_AccountsList($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an existing account. This method supports patch semantics. (accounts.patch)
     *
     * @param int $id The account id
     * @param Google_Account $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_Account
     */
    public function patch($id, Google_Service_Adexchangebuyer_Account $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_Account($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an existing account. (accounts.update)
     *
     * @param int $id The account id
     * @param Google_Account $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_Account
     */
    public function update($id, Google_Service_Adexchangebuyer_Account $postBody, $optParams = array()) {
      $params = array('id' => $id, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_Account($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "creatives" collection of methods.
   * Typical usage is:
   *  <code>
   *   $adexchangebuyerService = new Google_AdexchangebuyerService(...);
   *   $creatives = $adexchangebuyerService->creatives;
   *  </code>
   */
  class Google_Service_Adexchangebuyer_Creatives_Resource extends Google_Service_Resource {


    /**
     * Gets the status for a single creative. (creatives.get)
     *
     * @param int $accountId The id for the account that will serve this creative.
     * @param string $buyerCreativeId The buyer-specific id for this creative.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_Creative
     */
    public function get($accountId, $buyerCreativeId, $optParams = array()) {
      $params = array('accountId' => $accountId, 'buyerCreativeId' => $buyerCreativeId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_Creative($data);
      } else {
        return $data;
      }
    }
    /**
     * Submit a new creative. (creatives.insert)
     *
     * @param Google_Creative $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_Creative
     */
    public function insert(Google_Service_Adexchangebuyer_Creative $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_Creative($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves a list of the authenticated user's active creatives. (creatives.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param string maxResults Maximum number of entries returned on one result page. If not set, the default is 100. Optional.
     * @opt_param string pageToken A continuation token, used to page through ad clients. To retrieve the next page, set this parameter to the value of "nextPageToken" from the previous response. Optional.
     * @opt_param string statusFilter When specified, only creatives having the given status are returned.
     * @return Google_Service_Adexchangebuyer_CreativesList
     */
    public function listCreatives($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_CreativesList($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "directDeals" collection of methods.
   * Typical usage is:
   *  <code>
   *   $adexchangebuyerService = new Google_AdexchangebuyerService(...);
   *   $directDeals = $adexchangebuyerService->directDeals;
   *  </code>
   */
  class Google_Service_Adexchangebuyer_DirectDeals_Resource extends Google_Service_Resource {


    /**
     * Gets one direct deal by ID. (directDeals.get)
     *
     * @param string $id The direct deal id
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_DirectDeal
     */
    public function get($id, $optParams = array()) {
      $params = array('id' => $id);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_DirectDeal($data);
      } else {
        return $data;
      }
    }
    /**
     * Retrieves the authenticated user's list of direct deals. (directDeals.list)
     *
     * @param array $optParams Optional parameters.
     * @return Google_Service_Adexchangebuyer_DirectDealsList
     */
    public function listDirectDeals($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Adexchangebuyer_DirectDealsList($data);
      } else {
        return $data;
      }
    }
  }




class Google_Service_Adexchangebuyer_Account
    extends Google_Collection {
  protected $__bidderLocationType = 'Google_Service_Adexchangebuyer_AccountBidderLocation';
  protected $__bidderLocationDataType = 'array';
  public $bidderLocation;
  public $cookieMatchingNid;
  public $cookieMatchingUrl;
  public $id;
  public $kind;
  public $maximumTotalQps;
  public function setBidderLocation($bidderLocation) {
    $this->bidderLocation = $bidderLocation;
  }
  public function getBidderLocation() {
    return $this->bidderLocation;
  }
  public function setCookieMatchingNid($cookieMatchingNid) {
    $this->cookieMatchingNid = $cookieMatchingNid;
  }
  public function getCookieMatchingNid() {
    return $this->cookieMatchingNid;
  }
  public function setCookieMatchingUrl($cookieMatchingUrl) {
    $this->cookieMatchingUrl = $cookieMatchingUrl;
  }
  public function getCookieMatchingUrl() {
    return $this->cookieMatchingUrl;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setMaximumTotalQps($maximumTotalQps) {
    $this->maximumTotalQps = $maximumTotalQps;
  }
  public function getMaximumTotalQps() {
    return $this->maximumTotalQps;
  }
}

class Google_Service_Adexchangebuyer_AccountBidderLocation
    extends Google_Model {
  public $maximumQps;
  public $region;
  public $url;
  public function setMaximumQps($maximumQps) {
    $this->maximumQps = $maximumQps;
  }
  public function getMaximumQps() {
    return $this->maximumQps;
  }
  public function setRegion($region) {
    $this->region = $region;
  }
  public function getRegion() {
    return $this->region;
  }
  public function setUrl($url) {
    $this->url = $url;
  }
  public function getUrl() {
    return $this->url;
  }
}

class Google_Service_Adexchangebuyer_AccountsList
    extends Google_Collection {
  protected $__itemsType = 'Google_Service_Adexchangebuyer_Account';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setItems($items) {
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}

class Google_Service_Adexchangebuyer_Creative
    extends Google_Collection {
  public $HTMLSnippet;
  public $accountId;
  public $advertiserId;
  public $advertiserName;
  public $agencyId;
  public $attribute;
  public $buyerCreativeId;
  public $clickThroughUrl;
  protected $__disapprovalReasonsType = 'Google_Service_Adexchangebuyer_CreativeDisapprovalReasons';
  protected $__disapprovalReasonsDataType = 'array';
  public $disapprovalReasons;
  public $height;
  public $kind;
  public $productCategories;
  public $sensitiveCategories;
  public $status;
  public $vendorType;
  public $videoURL;
  public $width;
  public function setHTMLSnippet($HTMLSnippet) {
    $this->HTMLSnippet = $HTMLSnippet;
  }
  public function getHTMLSnippet() {
    return $this->HTMLSnippet;
  }
  public function setAccountId($accountId) {
    $this->accountId = $accountId;
  }
  public function getAccountId() {
    return $this->accountId;
  }
  public function setAdvertiserId($advertiserId) {
    $this->advertiserId = $advertiserId;
  }
  public function getAdvertiserId() {
    return $this->advertiserId;
  }
  public function setAdvertiserName($advertiserName) {
    $this->advertiserName = $advertiserName;
  }
  public function getAdvertiserName() {
    return $this->advertiserName;
  }
  public function setAgencyId($agencyId) {
    $this->agencyId = $agencyId;
  }
  public function getAgencyId() {
    return $this->agencyId;
  }
  public function setAttribute($attribute) {
    $this->attribute = $attribute;
  }
  public function getAttribute() {
    return $this->attribute;
  }
  public function setBuyerCreativeId($buyerCreativeId) {
    $this->buyerCreativeId = $buyerCreativeId;
  }
  public function getBuyerCreativeId() {
    return $this->buyerCreativeId;
  }
  public function setClickThroughUrl($clickThroughUrl) {
    $this->clickThroughUrl = $clickThroughUrl;
  }
  public function getClickThroughUrl() {
    return $this->clickThroughUrl;
  }
  public function setDisapprovalReasons($disapprovalReasons) {
    $this->disapprovalReasons = $disapprovalReasons;
  }
  public function getDisapprovalReasons() {
    return $this->disapprovalReasons;
  }
  public function setHeight($height) {
    $this->height = $height;
  }
  public function getHeight() {
    return $this->height;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setProductCategories($productCategories) {
    $this->productCategories = $productCategories;
  }
  public function getProductCategories() {
    return $this->productCategories;
  }
  public function setSensitiveCategories($sensitiveCategories) {
    $this->sensitiveCategories = $sensitiveCategories;
  }
  public function getSensitiveCategories() {
    return $this->sensitiveCategories;
  }
  public function setStatus($status) {
    $this->status = $status;
  }
  public function getStatus() {
    return $this->status;
  }
  public function setVendorType($vendorType) {
    $this->vendorType = $vendorType;
  }
  public function getVendorType() {
    return $this->vendorType;
  }
  public function setVideoURL($videoURL) {
    $this->videoURL = $videoURL;
  }
  public function getVideoURL() {
    return $this->videoURL;
  }
  public function setWidth($width) {
    $this->width = $width;
  }
  public function getWidth() {
    return $this->width;
  }
}

class Google_Service_Adexchangebuyer_CreativeDisapprovalReasons
    extends Google_Collection {
  public $details;
  public $reason;
  public function setDetails($details) {
    $this->details = $details;
  }
  public function getDetails() {
    return $this->details;
  }
  public function setReason($reason) {
    $this->reason = $reason;
  }
  public function getReason() {
    return $this->reason;
  }
}

class Google_Service_Adexchangebuyer_CreativesList
    extends Google_Collection {
  protected $__itemsType = 'Google_Service_Adexchangebuyer_Creative';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public $nextPageToken;
  public function setItems($items) {
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setNextPageToken($nextPageToken) {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken() {
    return $this->nextPageToken;
  }
}

class Google_Service_Adexchangebuyer_DirectDeal
    extends Google_Model {
  public $accountId;
  public $advertiser;
  public $currencyCode;
  public $endTime;
  public $fixedCpm;
  public $id;
  public $kind;
  public $privateExchangeMinCpm;
  public $sellerNetwork;
  public $startTime;
  public function setAccountId($accountId) {
    $this->accountId = $accountId;
  }
  public function getAccountId() {
    return $this->accountId;
  }
  public function setAdvertiser($advertiser) {
    $this->advertiser = $advertiser;
  }
  public function getAdvertiser() {
    return $this->advertiser;
  }
  public function setCurrencyCode($currencyCode) {
    $this->currencyCode = $currencyCode;
  }
  public function getCurrencyCode() {
    return $this->currencyCode;
  }
  public function setEndTime($endTime) {
    $this->endTime = $endTime;
  }
  public function getEndTime() {
    return $this->endTime;
  }
  public function setFixedCpm($fixedCpm) {
    $this->fixedCpm = $fixedCpm;
  }
  public function getFixedCpm() {
    return $this->fixedCpm;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setPrivateExchangeMinCpm($privateExchangeMinCpm) {
    $this->privateExchangeMinCpm = $privateExchangeMinCpm;
  }
  public function getPrivateExchangeMinCpm() {
    return $this->privateExchangeMinCpm;
  }
  public function setSellerNetwork($sellerNetwork) {
    $this->sellerNetwork = $sellerNetwork;
  }
  public function getSellerNetwork() {
    return $this->sellerNetwork;
  }
  public function setStartTime($startTime) {
    $this->startTime = $startTime;
  }
  public function getStartTime() {
    return $this->startTime;
  }
}

class Google_Service_Adexchangebuyer_DirectDealsList
    extends Google_Collection {
  protected $__directDealsType = 'Google_Service_Adexchangebuyer_DirectDeal';
  protected $__directDealsDataType = 'array';
  public $directDeals;
  public $kind;
  public function setDirectDeals($directDeals) {
    $this->directDeals = $directDeals;
  }
  public function getDirectDeals() {
    return $this->directDeals;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
}
