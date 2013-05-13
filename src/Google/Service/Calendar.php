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
 * Service definition for Calendar (v3).
 *
 * <p>
 * Lets you manipulate events and other calendar data.
 * </p>
 *
 * <p>
 * For more information about this service, see the
 * <a href="https://developers.google.com/google-apps/calendar/firstapp" target="_blank">API Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Calendar extends Google_Service {
  public $acl;
  public $calendarList;
  public $calendars;
  public $colors;
  public $events;
  public $freebusy;
  public $settings;
  /**
   * Constructs the internal representation of the Calendar service.
   *
   * @param Google_Client $client
   */
  public function __construct(Google_Client $client) {
    $this->servicePath = 'calendar/v3/';
    $this->version = 'v3';
    $this->serviceName = 'calendar';

    $client->addService($this->serviceName, $this->version);
    $this->acl = new Google_Service_Calendar_Acl_Resource($this, $this->serviceName, 'acl', json_decode('{"methods": {"delete": {"id": "calendar.acl.delete", "path": "calendars/{calendarId}/acl/{ruleId}", "httpMethod": "DELETE", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "ruleId": {"type": "string", "required": true, "location": "path"}}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "get": {"id": "calendar.acl.get", "path": "calendars/{calendarId}/acl/{ruleId}", "httpMethod": "GET", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "ruleId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "AclRule"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "insert": {"id": "calendar.acl.insert", "path": "calendars/{calendarId}/acl", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "AclRule"}, "response": {"$ref": "AclRule"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "list": {"id": "calendar.acl.list", "path": "calendars/{calendarId}/acl", "httpMethod": "GET", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Acl"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "patch": {"id": "calendar.acl.patch", "path": "calendars/{calendarId}/acl/{ruleId}", "httpMethod": "PATCH", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "ruleId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "AclRule"}, "response": {"$ref": "AclRule"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "update": {"id": "calendar.acl.update", "path": "calendars/{calendarId}/acl/{ruleId}", "httpMethod": "PUT", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "ruleId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "AclRule"}, "response": {"$ref": "AclRule"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}}}', true));
    $this->calendarList = new Google_Service_Calendar_CalendarList_Resource($this, $this->serviceName, 'calendarList', json_decode('{"methods": {"delete": {"id": "calendar.calendarList.delete", "path": "users/me/calendarList/{calendarId}", "httpMethod": "DELETE", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "get": {"id": "calendar.calendarList.get", "path": "users/me/calendarList/{calendarId}", "httpMethod": "GET", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "CalendarListEntry"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "insert": {"id": "calendar.calendarList.insert", "path": "users/me/calendarList", "httpMethod": "POST", "parameters": {"colorRgbFormat": {"type": "boolean", "location": "query"}}, "request": {"$ref": "CalendarListEntry"}, "response": {"$ref": "CalendarListEntry"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "list": {"id": "calendar.calendarList.list", "path": "users/me/calendarList", "httpMethod": "GET", "parameters": {"maxResults": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "minAccessRole": {"type": "string", "enum": ["freeBusyReader", "owner", "reader", "writer"], "location": "query"}, "pageToken": {"type": "string", "location": "query"}, "showHidden": {"type": "boolean", "location": "query"}}, "response": {"$ref": "CalendarList"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "patch": {"id": "calendar.calendarList.patch", "path": "users/me/calendarList/{calendarId}", "httpMethod": "PATCH", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "colorRgbFormat": {"type": "boolean", "location": "query"}}, "request": {"$ref": "CalendarListEntry"}, "response": {"$ref": "CalendarListEntry"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "update": {"id": "calendar.calendarList.update", "path": "users/me/calendarList/{calendarId}", "httpMethod": "PUT", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "colorRgbFormat": {"type": "boolean", "location": "query"}}, "request": {"$ref": "CalendarListEntry"}, "response": {"$ref": "CalendarListEntry"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}}}', true));
    $this->calendars = new Google_Service_Calendar_Calendars_Resource($this, $this->serviceName, 'calendars', json_decode('{"methods": {"clear": {"id": "calendar.calendars.clear", "path": "calendars/{calendarId}/clear", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "delete": {"id": "calendar.calendars.delete", "path": "calendars/{calendarId}", "httpMethod": "DELETE", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "get": {"id": "calendar.calendars.get", "path": "calendars/{calendarId}", "httpMethod": "GET", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Calendar"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "insert": {"id": "calendar.calendars.insert", "path": "calendars", "httpMethod": "POST", "request": {"$ref": "Calendar"}, "response": {"$ref": "Calendar"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "patch": {"id": "calendar.calendars.patch", "path": "calendars/{calendarId}", "httpMethod": "PATCH", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Calendar"}, "response": {"$ref": "Calendar"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "update": {"id": "calendar.calendars.update", "path": "calendars/{calendarId}", "httpMethod": "PUT", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Calendar"}, "response": {"$ref": "Calendar"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}}}', true));
    $this->colors = new Google_Service_Calendar_Colors_Resource($this, $this->serviceName, 'colors', json_decode('{"methods": {"get": {"id": "calendar.colors.get", "path": "colors", "httpMethod": "GET", "response": {"$ref": "Colors"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}}}', true));
    $this->events = new Google_Service_Calendar_Events_Resource($this, $this->serviceName, 'events', json_decode('{"methods": {"delete": {"id": "calendar.events.delete", "path": "calendars/{calendarId}/events/{eventId}", "httpMethod": "DELETE", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "eventId": {"type": "string", "required": true, "location": "path"}, "sendNotifications": {"type": "boolean", "location": "query"}}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "get": {"id": "calendar.events.get", "path": "calendars/{calendarId}/events/{eventId}", "httpMethod": "GET", "parameters": {"alwaysIncludeEmail": {"type": "boolean", "location": "query"}, "calendarId": {"type": "string", "required": true, "location": "path"}, "eventId": {"type": "string", "required": true, "location": "path"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "timeZone": {"type": "string", "location": "query"}}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "import": {"id": "calendar.events.import", "path": "calendars/{calendarId}/events/import", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}}, "request": {"$ref": "Event"}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "insert": {"id": "calendar.events.insert", "path": "calendars/{calendarId}/events", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "sendNotifications": {"type": "boolean", "location": "query"}}, "request": {"$ref": "Event"}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "instances": {"id": "calendar.events.instances", "path": "calendars/{calendarId}/events/{eventId}/instances", "httpMethod": "GET", "parameters": {"alwaysIncludeEmail": {"type": "boolean", "location": "query"}, "calendarId": {"type": "string", "required": true, "location": "path"}, "eventId": {"type": "string", "required": true, "location": "path"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "maxResults": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "originalStart": {"type": "string", "location": "query"}, "pageToken": {"type": "string", "location": "query"}, "showDeleted": {"type": "boolean", "location": "query"}, "timeMax": {"type": "string", "format": "date-time", "location": "query"}, "timeMin": {"type": "string", "format": "date-time", "location": "query"}, "timeZone": {"type": "string", "location": "query"}}, "response": {"$ref": "Events"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"], "supportsSubscription": true}, "list": {"id": "calendar.events.list", "path": "calendars/{calendarId}/events", "httpMethod": "GET", "parameters": {"alwaysIncludeEmail": {"type": "boolean", "location": "query"}, "calendarId": {"type": "string", "required": true, "location": "path"}, "iCalUID": {"type": "string", "location": "query"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "maxResults": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "orderBy": {"type": "string", "enum": ["startTime", "updated"], "location": "query"}, "pageToken": {"type": "string", "location": "query"}, "q": {"type": "string", "location": "query"}, "showDeleted": {"type": "boolean", "location": "query"}, "showHiddenInvitations": {"type": "boolean", "location": "query"}, "singleEvents": {"type": "boolean", "location": "query"}, "timeMax": {"type": "string", "format": "date-time", "location": "query"}, "timeMin": {"type": "string", "format": "date-time", "location": "query"}, "timeZone": {"type": "string", "location": "query"}, "updatedMin": {"type": "string", "format": "date-time", "location": "query"}}, "response": {"$ref": "Events"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"], "supportsSubscription": true}, "move": {"id": "calendar.events.move", "path": "calendars/{calendarId}/events/{eventId}/move", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "destination": {"type": "string", "required": true, "location": "query"}, "eventId": {"type": "string", "required": true, "location": "path"}, "sendNotifications": {"type": "boolean", "location": "query"}}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "patch": {"id": "calendar.events.patch", "path": "calendars/{calendarId}/events/{eventId}", "httpMethod": "PATCH", "parameters": {"alwaysIncludeEmail": {"type": "boolean", "location": "query"}, "calendarId": {"type": "string", "required": true, "location": "path"}, "eventId": {"type": "string", "required": true, "location": "path"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "sendNotifications": {"type": "boolean", "location": "query"}}, "request": {"$ref": "Event"}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "quickAdd": {"id": "calendar.events.quickAdd", "path": "calendars/{calendarId}/events/quickAdd", "httpMethod": "POST", "parameters": {"calendarId": {"type": "string", "required": true, "location": "path"}, "sendNotifications": {"type": "boolean", "location": "query"}, "text": {"type": "string", "required": true, "location": "query"}}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}, "update": {"id": "calendar.events.update", "path": "calendars/{calendarId}/events/{eventId}", "httpMethod": "PUT", "parameters": {"alwaysIncludeEmail": {"type": "boolean", "location": "query"}, "calendarId": {"type": "string", "required": true, "location": "path"}, "eventId": {"type": "string", "required": true, "location": "path"}, "maxAttendees": {"type": "integer", "format": "int32", "minimum": "1", "location": "query"}, "sendNotifications": {"type": "boolean", "location": "query"}}, "request": {"$ref": "Event"}, "response": {"$ref": "Event"}, "scopes": ["https://www.googleapis.com/auth/calendar"]}}}', true));
    $this->freebusy = new Google_Service_Calendar_Freebusy_Resource($this, $this->serviceName, 'freebusy', json_decode('{"methods": {"query": {"id": "calendar.freebusy.query", "path": "freeBusy", "httpMethod": "POST", "request": {"$ref": "FreeBusyRequest"}, "response": {"$ref": "FreeBusyResponse"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}}}', true));
    $this->settings = new Google_Service_Calendar_Settings_Resource($this, $this->serviceName, 'settings', json_decode('{"methods": {"get": {"id": "calendar.settings.get", "path": "users/me/settings/{setting}", "httpMethod": "GET", "parameters": {"setting": {"type": "string", "required": true, "location": "path"}}, "response": {"$ref": "Setting"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}, "list": {"id": "calendar.settings.list", "path": "users/me/settings", "httpMethod": "GET", "response": {"$ref": "Settings"}, "scopes": ["https://www.googleapis.com/auth/calendar", "https://www.googleapis.com/auth/calendar.readonly"]}}}', true));

  }
}


  /**
   * The "acl" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $acl = $calendarService->acl;
   *  </code>
   */
  class Google_Service_Calendar_Acl_Resource extends Google_Service_Resource {


    /**
     * Deletes an access control rule. (acl.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param array $optParams Optional parameters.
     */
    public function delete($calendarId, $ruleId, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Returns an access control rule. (acl.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_AclRule
     */
    public function get($calendarId, $ruleId, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_AclRule($data);
      } else {
        return $data;
      }
    }
    /**
     * Creates an access control rule. (acl.insert)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_AclRule $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_AclRule
     */
    public function insert($calendarId, Google_Service_Calendar_AclRule $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_AclRule($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns the rules in the access control list for the calendar. (acl.list)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Acl
     */
    public function listAcl($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Acl($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an access control rule. This method supports patch semantics. (acl.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param Google_AclRule $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_AclRule
     */
    public function patch($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_AclRule($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an access control rule. (acl.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $ruleId ACL rule identifier.
     * @param Google_AclRule $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_AclRule
     */
    public function update($calendarId, $ruleId, Google_Service_Calendar_AclRule $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'ruleId' => $ruleId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_AclRule($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "calendarList" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $calendarList = $calendarService->calendarList;
   *  </code>
   */
  class Google_Service_Calendar_CalendarList_Resource extends Google_Service_Resource {


    /**
     * Deletes an entry on the user's calendar list. (calendarList.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     */
    public function delete($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Returns an entry on the user's calendar list. (calendarList.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_CalendarListEntry
     */
    public function get($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_CalendarListEntry($data);
      } else {
        return $data;
      }
    }
    /**
     * Adds an entry to the user's calendar list. (calendarList.insert)
     *
     * @param Google_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool colorRgbFormat Whether to use the 'foregroundColor' and 'backgroundColor' fields to write the calendar colors (RGB). If this feature is used, the index-based 'colorId' field will be set to the best matching option automatically. Optional. The default is False.
     * @return Google_Service_Calendar_CalendarListEntry
     */
    public function insert(Google_Service_Calendar_CalendarListEntry $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_CalendarListEntry($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns entries on the user's calendar list. (calendarList.list)
     *
     * @param array $optParams Optional parameters.
     *
     * @opt_param int maxResults Maximum number of entries returned on one result page. Optional.
     * @opt_param string minAccessRole The minimum access role for the user in the returned entires. Optional. The default is no restriction.
     * @opt_param string pageToken Token specifying which result page to return. Optional.
     * @opt_param bool showHidden Whether to show hidden entries. Optional. The default is False.
     * @return Google_Service_Calendar_CalendarList
     */
    public function listCalendarList($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_CalendarList($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an entry on the user's calendar list. This method supports patch semantics.
     * (calendarList.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool colorRgbFormat Whether to use the 'foregroundColor' and 'backgroundColor' fields to write the calendar colors (RGB). If this feature is used, the index-based 'colorId' field will be set to the best matching option automatically. Optional. The default is False.
     * @return Google_Service_Calendar_CalendarListEntry
     */
    public function patch($calendarId, Google_Service_Calendar_CalendarListEntry $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_CalendarListEntry($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an entry on the user's calendar list. (calendarList.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_CalendarListEntry $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool colorRgbFormat Whether to use the 'foregroundColor' and 'backgroundColor' fields to write the calendar colors (RGB). If this feature is used, the index-based 'colorId' field will be set to the best matching option automatically. Optional. The default is False.
     * @return Google_Service_Calendar_CalendarListEntry
     */
    public function update($calendarId, Google_Service_Calendar_CalendarListEntry $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_CalendarListEntry($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "calendars" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $calendars = $calendarService->calendars;
   *  </code>
   */
  class Google_Service_Calendar_Calendars_Resource extends Google_Service_Resource {


    /**
     * Clears a primary calendar. This operation deletes all data associated with the primary calendar
     * of an account and cannot be undone. (calendars.clear)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     */
    public function clear($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('clear', array($params));
      return $data;
    }
    /**
     * Deletes a secondary calendar. (calendars.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     */
    public function delete($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Returns metadata for a calendar. (calendars.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Calendar
     */
    public function get($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Calendar($data);
      } else {
        return $data;
      }
    }
    /**
     * Creates a secondary calendar. (calendars.insert)
     *
     * @param Google_Calendar $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Calendar
     */
    public function insert(Google_Service_Calendar_Calendar $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Calendar($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates metadata for a calendar. This method supports patch semantics. (calendars.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Calendar $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Calendar
     */
    public function patch($calendarId, Google_Service_Calendar_Calendar $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Calendar($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates metadata for a calendar. (calendars.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Calendar $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Calendar
     */
    public function update($calendarId, Google_Service_Calendar_Calendar $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Calendar($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "colors" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $colors = $calendarService->colors;
   *  </code>
   */
  class Google_Service_Calendar_Colors_Resource extends Google_Service_Resource {


    /**
     * Returns the color definitions for calendars and events. (colors.get)
     *
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Colors
     */
    public function get($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Colors($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "events" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $events = $calendarService->events;
   *  </code>
   */
  class Google_Service_Calendar_Events_Resource extends Google_Service_Resource {


    /**
     * Deletes an event. (events.delete)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool sendNotifications Whether to send notifications about the deletion of the event. Optional. The default is False.
     */
    public function delete($calendarId, $eventId, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('delete', array($params));
      return $data;
    }
    /**
     * Returns an event. (events.get)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the "email" field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param string timeZone Time zone used in the response. Optional. The default is the time zone of the calendar.
     * @return Google_Service_Calendar_Event
     */
    public function get($calendarId, $eventId, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Imports an event. (events.import)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Event $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Event
     */
    public function import($calendarId, Google_Service_Calendar_Event $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('import', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Creates an event. (events.insert)
     *
     * @param string $calendarId Calendar identifier.
     * @param Google_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param bool sendNotifications Whether to send notifications about the creation of the new event. Optional. The default is False.
     * @return Google_Service_Calendar_Event
     */
    public function insert($calendarId, Google_Service_Calendar_Event $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('insert', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns instances of the specified recurring event. (events.instances)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Recurring event identifier.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the "email" field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param int maxResults Maximum number of events returned on one result page. Optional.
     * @opt_param string originalStart The original start time of the instance in the result. Optional.
     * @opt_param string pageToken Token specifying which result page to return. Optional.
     * @opt_param bool showDeleted Whether to include deleted events (with 'status' equals 'cancelled') in the result. Cancelled instances of recurring events will still be included if 'singleEvents' is False. Optional. The default is False.
     * @opt_param string timeMax Upper bound (exclusive) for an event's start time to filter by. Optional. The default is not to filter by start time.
     * @opt_param string timeMin Lower bound (inclusive) for an event's end time to filter by. Optional. The default is not to filter by end time.
     * @opt_param string timeZone Time zone used in the response. Optional. The default is the time zone of the calendar.
     * @return Google_Service_Calendar_Events
     */
    public function instances($calendarId, $eventId, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('instances', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Events($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns events on the specified calendar. (events.list)
     *
     * @param string $calendarId Calendar identifier.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the "email" field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. Optional. The default is False.
     * @opt_param string iCalUID Specifies iCalendar UID (iCalUID) of events to be included in the response. Optional.
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param int maxResults Maximum number of events returned on one result page. Optional.
     * @opt_param string orderBy The order of the events returned in the result. Optional. The default is an unspecified, stable order.
     * @opt_param string pageToken Token specifying which result page to return. Optional.
     * @opt_param string q Free text search terms to find events that match these terms in any field, except for extended properties. Optional.
     * @opt_param bool showDeleted Whether to include deleted events (with 'status' equals 'cancelled') in the result. Cancelled instances of recurring events (but not the underlying recurring event) will still be included if 'showDeleted' and 'singleEvents' are both False. If 'showDeleted' and 'singleEvents' are both True, only single instances of deleted events (but not the underlying recurring events) are returned. Optional. The default is False.
     * @opt_param bool showHiddenInvitations Whether to include hidden invitations in the result. Optional. The default is False.
     * @opt_param bool singleEvents Whether to expand recurring events into instances and only return single one-off events and instances of recurring events, but not the underlying recurring events themselves. Optional. The default is False.
     * @opt_param string timeMax Upper bound (exclusive) for an event's start time to filter by. Optional. The default is not to filter by start time.
     * @opt_param string timeMin Lower bound (inclusive) for an event's end time to filter by. Optional. The default is not to filter by end time.
     * @opt_param string timeZone Time zone used in the response. Optional. The default is the time zone of the calendar.
     * @opt_param string updatedMin Lower bound for an event's last modification time (as a RFC 3339 timestamp) to filter by. Optional. The default is not to filter by last modification time.
     * @return Google_Service_Calendar_Events
     */
    public function listEvents($calendarId, $optParams = array()) {
      $params = array('calendarId' => $calendarId);
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Events($data);
      } else {
        return $data;
      }
    }
    /**
     * Moves an event to another calendar, i.e. changes an event's organizer. (events.move)
     *
     * @param string $calendarId Calendar identifier of the source calendar where the event currently is on.
     * @param string $eventId Event identifier.
     * @param string $destination Calendar identifier of the target calendar where the event is to be moved to.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool sendNotifications Whether to send notifications about the change of the event's organizer. Optional. The default is False.
     * @return Google_Service_Calendar_Event
     */
    public function move($calendarId, $eventId, $destination, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'destination' => $destination);
      $params = array_merge($params, $optParams);
      $data = $this->__call('move', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an event. This method supports patch semantics. (events.patch)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param Google_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the "email" field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param bool sendNotifications Whether to send notifications about the event update (e.g. attendee's responses, title changes, etc.). Optional. The default is False.
     * @return Google_Service_Calendar_Event
     */
    public function patch($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('patch', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Creates an event based on a simple text string. (events.quickAdd)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $text The text describing the event to be created.
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool sendNotifications Whether to send notifications about the creation of the event. Optional. The default is False.
     * @return Google_Service_Calendar_Event
     */
    public function quickAdd($calendarId, $text, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'text' => $text);
      $params = array_merge($params, $optParams);
      $data = $this->__call('quickAdd', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
    /**
     * Updates an event. (events.update)
     *
     * @param string $calendarId Calendar identifier.
     * @param string $eventId Event identifier.
     * @param Google_Event $postBody
     * @param array $optParams Optional parameters.
     *
     * @opt_param bool alwaysIncludeEmail Whether to always include a value in the "email" field for the organizer, creator and attendees, even if no real email is available (i.e. a generated, non-working value will be provided). The use of this option is discouraged and should only be used by clients which cannot handle the absence of an email address value in the mentioned places. Optional. The default is False.
     * @opt_param int maxAttendees The maximum number of attendees to include in the response. If there are more than the specified number of attendees, only the participant is returned. Optional.
     * @opt_param bool sendNotifications Whether to send notifications about the event update (e.g. attendee's responses, title changes, etc.). Optional. The default is False.
     * @return Google_Service_Calendar_Event
     */
    public function update($calendarId, $eventId, Google_Service_Calendar_Event $postBody, $optParams = array()) {
      $params = array('calendarId' => $calendarId, 'eventId' => $eventId, 'postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('update', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Event($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "freebusy" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $freebusy = $calendarService->freebusy;
   *  </code>
   */
  class Google_Service_Calendar_Freebusy_Resource extends Google_Service_Resource {


    /**
     * Returns free/busy information for a set of calendars. (freebusy.query)
     *
     * @param Google_FreeBusyRequest $postBody
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_FreeBusyResponse
     */
    public function query(Google_Service_Calendar_FreeBusyRequest $postBody, $optParams = array()) {
      $params = array('postBody' => $postBody);
      $params = array_merge($params, $optParams);
      $data = $this->__call('query', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_FreeBusyResponse($data);
      } else {
        return $data;
      }
    }
  }

  /**
   * The "settings" collection of methods.
   * Typical usage is:
   *  <code>
   *   $calendarService = new Google_Service_Calendar(...);
   *   $settings = $calendarService->settings;
   *  </code>
   */
  class Google_Service_Calendar_Settings_Resource extends Google_Service_Resource {


    /**
     * Returns a single user setting. (settings.get)
     *
     * @param string $setting Name of the user setting.
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Setting
     */
    public function get($setting, $optParams = array()) {
      $params = array('setting' => $setting);
      $params = array_merge($params, $optParams);
      $data = $this->__call('get', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Setting($data);
      } else {
        return $data;
      }
    }
    /**
     * Returns all user settings for the authenticated user. (settings.list)
     *
     * @param array $optParams Optional parameters.
     * @return Google_Service_Calendar_Settings
     */
    public function listSettings($optParams = array()) {
      $params = array();
      $params = array_merge($params, $optParams);
      $data = $this->__call('list', array($params));
      if ($this->useObjects()) {
        return new Google_Service_Calendar_Settings($data);
      } else {
        return $data;
      }
    }
  }




class Google_Service_Calendar_Acl
    extends Google_Collection {
  public $etag;
  protected $__itemsType = 'Google_Service_Calendar_AclRule';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public $nextPageToken;
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
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

class Google_Service_Calendar_AclRule
    extends Google_Model {
  public $etag;
  public $id;
  public $kind;
  public $role;
  protected $__scopeType = 'Google_Service_Calendar_AclRuleScope';
  protected $__scopeDataType = '';
  public $scope;
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
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
  public function setRole($role) {
    $this->role = $role;
  }
  public function getRole() {
    return $this->role;
  }
  public function setScope(Google_Service_Calendar_AclRuleScope$scope) {
    $this->scope = $scope;
  }
  public function getScope() {
    return $this->scope;
  }
}

class Google_Service_Calendar_AclRuleScope
    extends Google_Model {
  public $type;
  public $value;
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
  public function setValue($value) {
    $this->value = $value;
  }
  public function getValue() {
    return $this->value;
  }
}

class Google_Service_Calendar_Calendar
    extends Google_Model {
  public $description;
  public $etag;
  public $id;
  public $kind;
  public $location;
  public $summary;
  public $timeZone;
  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
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
  public function setLocation($location) {
    $this->location = $location;
  }
  public function getLocation() {
    return $this->location;
  }
  public function setSummary($summary) {
    $this->summary = $summary;
  }
  public function getSummary() {
    return $this->summary;
  }
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone() {
    return $this->timeZone;
  }
}

class Google_Service_Calendar_CalendarList
    extends Google_Collection {
  public $etag;
  protected $__itemsType = 'Google_Service_Calendar_CalendarListEntry';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public $nextPageToken;
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
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

class Google_Service_Calendar_CalendarListEntry
    extends Google_Collection {
  public $accessRole;
  public $backgroundColor;
  public $colorId;
  protected $__defaultRemindersType = 'Google_Service_Calendar_EventReminder';
  protected $__defaultRemindersDataType = 'array';
  public $defaultReminders;
  public $description;
  public $etag;
  public $foregroundColor;
  public $hidden;
  public $id;
  public $kind;
  public $location;
  public $primary;
  public $selected;
  public $summary;
  public $summaryOverride;
  public $timeZone;
  public function setAccessRole($accessRole) {
    $this->accessRole = $accessRole;
  }
  public function getAccessRole() {
    return $this->accessRole;
  }
  public function setBackgroundColor($backgroundColor) {
    $this->backgroundColor = $backgroundColor;
  }
  public function getBackgroundColor() {
    return $this->backgroundColor;
  }
  public function setColorId($colorId) {
    $this->colorId = $colorId;
  }
  public function getColorId() {
    return $this->colorId;
  }
  public function setDefaultReminders($defaultReminders) {
    $this->defaultReminders = $defaultReminders;
  }
  public function getDefaultReminders() {
    return $this->defaultReminders;
  }
  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
  public function setForegroundColor($foregroundColor) {
    $this->foregroundColor = $foregroundColor;
  }
  public function getForegroundColor() {
    return $this->foregroundColor;
  }
  public function setHidden($hidden) {
    $this->hidden = $hidden;
  }
  public function getHidden() {
    return $this->hidden;
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
  public function setLocation($location) {
    $this->location = $location;
  }
  public function getLocation() {
    return $this->location;
  }
  public function setPrimary($primary) {
    $this->primary = $primary;
  }
  public function getPrimary() {
    return $this->primary;
  }
  public function setSelected($selected) {
    $this->selected = $selected;
  }
  public function getSelected() {
    return $this->selected;
  }
  public function setSummary($summary) {
    $this->summary = $summary;
  }
  public function getSummary() {
    return $this->summary;
  }
  public function setSummaryOverride($summaryOverride) {
    $this->summaryOverride = $summaryOverride;
  }
  public function getSummaryOverride() {
    return $this->summaryOverride;
  }
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone() {
    return $this->timeZone;
  }
}

class Google_Service_Calendar_ColorDefinition
    extends Google_Model {
  public $background;
  public $foreground;
  public function setBackground($background) {
    $this->background = $background;
  }
  public function getBackground() {
    return $this->background;
  }
  public function setForeground($foreground) {
    $this->foreground = $foreground;
  }
  public function getForeground() {
    return $this->foreground;
  }
}

class Google_Service_Calendar_Colors
    extends Google_Model {
  protected $__calendarType = 'Google_Service_Calendar_ColorDefinition';
  protected $__calendarDataType = 'map';
  public $calendar;
  protected $__eventType = 'Google_Service_Calendar_ColorDefinition';
  protected $__eventDataType = 'map';
  public $event;
  public $kind;
  public $updated;
  public function setCalendar(Google_Service_Calendar_ColorDefinition$calendar) {
    $this->calendar = $calendar;
  }
  public function getCalendar() {
    return $this->calendar;
  }
  public function setEvent(Google_Service_Calendar_ColorDefinition$event) {
    $this->event = $event;
  }
  public function getEvent() {
    return $this->event;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setUpdated($updated) {
    $this->updated = $updated;
  }
  public function getUpdated() {
    return $this->updated;
  }
}

class Google_Service_Calendar_Error
    extends Google_Model {
  public $domain;
  public $reason;
  public function setDomain($domain) {
    $this->domain = $domain;
  }
  public function getDomain() {
    return $this->domain;
  }
  public function setReason($reason) {
    $this->reason = $reason;
  }
  public function getReason() {
    return $this->reason;
  }
}

class Google_Service_Calendar_Event
    extends Google_Collection {
  public $anyoneCanAddSelf;
  protected $__attendeesType = 'Google_Service_Calendar_EventAttendee';
  protected $__attendeesDataType = 'array';
  public $attendees;
  public $attendeesOmitted;
  public $colorId;
  public $created;
  protected $__creatorType = 'Google_Service_Calendar_EventCreator';
  protected $__creatorDataType = '';
  public $creator;
  public $description;
  protected $__endType = 'Google_Service_Calendar_EventDateTime';
  protected $__endDataType = '';
  public $end;
  public $endTimeUnspecified;
  public $etag;
  protected $__extendedPropertiesType = 'Google_Service_Calendar_EventExtendedProperties';
  protected $__extendedPropertiesDataType = '';
  public $extendedProperties;
  protected $__gadgetType = 'Google_Service_Calendar_EventGadget';
  protected $__gadgetDataType = '';
  public $gadget;
  public $guestsCanInviteOthers;
  public $guestsCanModify;
  public $guestsCanSeeOtherGuests;
  public $hangoutLink;
  public $htmlLink;
  public $iCalUID;
  public $id;
  public $kind;
  public $location;
  public $locked;
  protected $__organizerType = 'Google_Service_Calendar_EventOrganizer';
  protected $__organizerDataType = '';
  public $organizer;
  protected $__originalStartTimeType = 'Google_Service_Calendar_EventDateTime';
  protected $__originalStartTimeDataType = '';
  public $originalStartTime;
  public $privateCopy;
  public $recurrence;
  public $recurringEventId;
  protected $__remindersType = 'Google_Service_Calendar_EventReminders';
  protected $__remindersDataType = '';
  public $reminders;
  public $sequence;
  protected $__sourceType = 'Google_Service_Calendar_EventSource';
  protected $__sourceDataType = '';
  public $source;
  protected $__startType = 'Google_Service_Calendar_EventDateTime';
  protected $__startDataType = '';
  public $start;
  public $status;
  public $summary;
  public $transparency;
  public $updated;
  public $visibility;
  public function setAnyoneCanAddSelf($anyoneCanAddSelf) {
    $this->anyoneCanAddSelf = $anyoneCanAddSelf;
  }
  public function getAnyoneCanAddSelf() {
    return $this->anyoneCanAddSelf;
  }
  public function setAttendees($attendees) {
    $this->attendees = $attendees;
  }
  public function getAttendees() {
    return $this->attendees;
  }
  public function setAttendeesOmitted($attendeesOmitted) {
    $this->attendeesOmitted = $attendeesOmitted;
  }
  public function getAttendeesOmitted() {
    return $this->attendeesOmitted;
  }
  public function setColorId($colorId) {
    $this->colorId = $colorId;
  }
  public function getColorId() {
    return $this->colorId;
  }
  public function setCreated($created) {
    $this->created = $created;
  }
  public function getCreated() {
    return $this->created;
  }
  public function setCreator(Google_Service_Calendar_EventCreator$creator) {
    $this->creator = $creator;
  }
  public function getCreator() {
    return $this->creator;
  }
  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setEnd(Google_Service_Calendar_EventDateTime$end) {
    $this->end = $end;
  }
  public function getEnd() {
    return $this->end;
  }
  public function setEndTimeUnspecified($endTimeUnspecified) {
    $this->endTimeUnspecified = $endTimeUnspecified;
  }
  public function getEndTimeUnspecified() {
    return $this->endTimeUnspecified;
  }
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
  public function setExtendedProperties(Google_Service_Calendar_EventExtendedProperties$extendedProperties) {
    $this->extendedProperties = $extendedProperties;
  }
  public function getExtendedProperties() {
    return $this->extendedProperties;
  }
  public function setGadget(Google_Service_Calendar_EventGadget$gadget) {
    $this->gadget = $gadget;
  }
  public function getGadget() {
    return $this->gadget;
  }
  public function setGuestsCanInviteOthers($guestsCanInviteOthers) {
    $this->guestsCanInviteOthers = $guestsCanInviteOthers;
  }
  public function getGuestsCanInviteOthers() {
    return $this->guestsCanInviteOthers;
  }
  public function setGuestsCanModify($guestsCanModify) {
    $this->guestsCanModify = $guestsCanModify;
  }
  public function getGuestsCanModify() {
    return $this->guestsCanModify;
  }
  public function setGuestsCanSeeOtherGuests($guestsCanSeeOtherGuests) {
    $this->guestsCanSeeOtherGuests = $guestsCanSeeOtherGuests;
  }
  public function getGuestsCanSeeOtherGuests() {
    return $this->guestsCanSeeOtherGuests;
  }
  public function setHangoutLink($hangoutLink) {
    $this->hangoutLink = $hangoutLink;
  }
  public function getHangoutLink() {
    return $this->hangoutLink;
  }
  public function setHtmlLink($htmlLink) {
    $this->htmlLink = $htmlLink;
  }
  public function getHtmlLink() {
    return $this->htmlLink;
  }
  public function setICalUID($iCalUID) {
    $this->iCalUID = $iCalUID;
  }
  public function getICalUID() {
    return $this->iCalUID;
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
  public function setLocation($location) {
    $this->location = $location;
  }
  public function getLocation() {
    return $this->location;
  }
  public function setLocked($locked) {
    $this->locked = $locked;
  }
  public function getLocked() {
    return $this->locked;
  }
  public function setOrganizer(Google_Service_Calendar_EventOrganizer$organizer) {
    $this->organizer = $organizer;
  }
  public function getOrganizer() {
    return $this->organizer;
  }
  public function setOriginalStartTime(Google_Service_Calendar_EventDateTime$originalStartTime) {
    $this->originalStartTime = $originalStartTime;
  }
  public function getOriginalStartTime() {
    return $this->originalStartTime;
  }
  public function setPrivateCopy($privateCopy) {
    $this->privateCopy = $privateCopy;
  }
  public function getPrivateCopy() {
    return $this->privateCopy;
  }
  public function setRecurrence($recurrence) {
    $this->recurrence = $recurrence;
  }
  public function getRecurrence() {
    return $this->recurrence;
  }
  public function setRecurringEventId($recurringEventId) {
    $this->recurringEventId = $recurringEventId;
  }
  public function getRecurringEventId() {
    return $this->recurringEventId;
  }
  public function setReminders(Google_Service_Calendar_EventReminders$reminders) {
    $this->reminders = $reminders;
  }
  public function getReminders() {
    return $this->reminders;
  }
  public function setSequence($sequence) {
    $this->sequence = $sequence;
  }
  public function getSequence() {
    return $this->sequence;
  }
  public function setSource(Google_Service_Calendar_EventSource$source) {
    $this->source = $source;
  }
  public function getSource() {
    return $this->source;
  }
  public function setStart(Google_Service_Calendar_EventDateTime$start) {
    $this->start = $start;
  }
  public function getStart() {
    return $this->start;
  }
  public function setStatus($status) {
    $this->status = $status;
  }
  public function getStatus() {
    return $this->status;
  }
  public function setSummary($summary) {
    $this->summary = $summary;
  }
  public function getSummary() {
    return $this->summary;
  }
  public function setTransparency($transparency) {
    $this->transparency = $transparency;
  }
  public function getTransparency() {
    return $this->transparency;
  }
  public function setUpdated($updated) {
    $this->updated = $updated;
  }
  public function getUpdated() {
    return $this->updated;
  }
  public function setVisibility($visibility) {
    $this->visibility = $visibility;
  }
  public function getVisibility() {
    return $this->visibility;
  }
}

class Google_Service_Calendar_EventAttendee
    extends Google_Model {
  public $additionalGuests;
  public $comment;
  public $displayName;
  public $email;
  public $id;
  public $optional;
  public $organizer;
  public $resource;
  public $responseStatus;
  public $self;
  public function setAdditionalGuests($additionalGuests) {
    $this->additionalGuests = $additionalGuests;
  }
  public function getAdditionalGuests() {
    return $this->additionalGuests;
  }
  public function setComment($comment) {
    $this->comment = $comment;
  }
  public function getComment() {
    return $this->comment;
  }
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setOptional($optional) {
    $this->optional = $optional;
  }
  public function getOptional() {
    return $this->optional;
  }
  public function setOrganizer($organizer) {
    $this->organizer = $organizer;
  }
  public function getOrganizer() {
    return $this->organizer;
  }
  public function setResource($resource) {
    $this->resource = $resource;
  }
  public function getResource() {
    return $this->resource;
  }
  public function setResponseStatus($responseStatus) {
    $this->responseStatus = $responseStatus;
  }
  public function getResponseStatus() {
    return $this->responseStatus;
  }
  public function setSelf($self) {
    $this->self = $self;
  }
  public function getSelf() {
    return $this->self;
  }
}

class Google_Service_Calendar_EventCreator
    extends Google_Model {
  public $displayName;
  public $email;
  public $id;
  public $self;
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setSelf($self) {
    $this->self = $self;
  }
  public function getSelf() {
    return $this->self;
  }
}

class Google_Service_Calendar_EventDateTime
    extends Google_Model {
  public $date;
  public $dateTime;
  public $timeZone;
  public function setDate($date) {
    $this->date = $date;
  }
  public function getDate() {
    return $this->date;
  }
  public function setDateTime($dateTime) {
    $this->dateTime = $dateTime;
  }
  public function getDateTime() {
    return $this->dateTime;
  }
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone() {
    return $this->timeZone;
  }
}

class Google_Service_Calendar_EventExtendedProperties
    extends Google_Model {
  public $private;
  public $shared;
  public function setPrivate($private) {
    $this->private = $private;
  }
  public function getPrivate() {
    return $this->private;
  }
  public function setShared($shared) {
    $this->shared = $shared;
  }
  public function getShared() {
    return $this->shared;
  }
}

class Google_Service_Calendar_EventGadget
    extends Google_Model {
  public $display;
  public $height;
  public $iconLink;
  public $link;
  public $preferences;
  public $title;
  public $type;
  public $width;
  public function setDisplay($display) {
    $this->display = $display;
  }
  public function getDisplay() {
    return $this->display;
  }
  public function setHeight($height) {
    $this->height = $height;
  }
  public function getHeight() {
    return $this->height;
  }
  public function setIconLink($iconLink) {
    $this->iconLink = $iconLink;
  }
  public function getIconLink() {
    return $this->iconLink;
  }
  public function setLink($link) {
    $this->link = $link;
  }
  public function getLink() {
    return $this->link;
  }
  public function setPreferences($preferences) {
    $this->preferences = $preferences;
  }
  public function getPreferences() {
    return $this->preferences;
  }
  public function setTitle($title) {
    $this->title = $title;
  }
  public function getTitle() {
    return $this->title;
  }
  public function setType($type) {
    $this->type = $type;
  }
  public function getType() {
    return $this->type;
  }
  public function setWidth($width) {
    $this->width = $width;
  }
  public function getWidth() {
    return $this->width;
  }
}

class Google_Service_Calendar_EventOrganizer
    extends Google_Model {
  public $displayName;
  public $email;
  public $id;
  public $self;
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }
  public function getDisplayName() {
    return $this->displayName;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setSelf($self) {
    $this->self = $self;
  }
  public function getSelf() {
    return $this->self;
  }
}

class Google_Service_Calendar_EventReminder
    extends Google_Model {
  public $method;
  public $minutes;
  public function setMethod($method) {
    $this->method = $method;
  }
  public function getMethod() {
    return $this->method;
  }
  public function setMinutes($minutes) {
    $this->minutes = $minutes;
  }
  public function getMinutes() {
    return $this->minutes;
  }
}

class Google_Service_Calendar_EventReminders
    extends Google_Collection {
  protected $__overridesType = 'Google_Service_Calendar_EventReminder';
  protected $__overridesDataType = 'array';
  public $overrides;
  public $useDefault;
  public function setOverrides($overrides) {
    $this->overrides = $overrides;
  }
  public function getOverrides() {
    return $this->overrides;
  }
  public function setUseDefault($useDefault) {
    $this->useDefault = $useDefault;
  }
  public function getUseDefault() {
    return $this->useDefault;
  }
}

class Google_Service_Calendar_EventSource
    extends Google_Model {
  public $title;
  public $url;
  public function setTitle($title) {
    $this->title = $title;
  }
  public function getTitle() {
    return $this->title;
  }
  public function setUrl($url) {
    $this->url = $url;
  }
  public function getUrl() {
    return $this->url;
  }
}

class Google_Service_Calendar_Events
    extends Google_Collection {
  public $accessRole;
  protected $__defaultRemindersType = 'Google_Service_Calendar_EventReminder';
  protected $__defaultRemindersDataType = 'array';
  public $defaultReminders;
  public $description;
  public $etag;
  protected $__itemsType = 'Google_Service_Calendar_Event';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public $nextPageToken;
  public $summary;
  public $timeZone;
  public $updated;
  public function setAccessRole($accessRole) {
    $this->accessRole = $accessRole;
  }
  public function getAccessRole() {
    return $this->accessRole;
  }
  public function setDefaultReminders($defaultReminders) {
    $this->defaultReminders = $defaultReminders;
  }
  public function getDefaultReminders() {
    return $this->defaultReminders;
  }
  public function setDescription($description) {
    $this->description = $description;
  }
  public function getDescription() {
    return $this->description;
  }
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
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
  public function setSummary($summary) {
    $this->summary = $summary;
  }
  public function getSummary() {
    return $this->summary;
  }
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone() {
    return $this->timeZone;
  }
  public function setUpdated($updated) {
    $this->updated = $updated;
  }
  public function getUpdated() {
    return $this->updated;
  }
}

class Google_Service_Calendar_FreeBusyCalendar
    extends Google_Collection {
  protected $__busyType = 'Google_Service_Calendar_TimePeriod';
  protected $__busyDataType = 'array';
  public $busy;
  protected $__errorsType = 'Google_Service_Calendar_Error';
  protected $__errorsDataType = 'array';
  public $errors;
  public function setBusy($busy) {
    $this->busy = $busy;
  }
  public function getBusy() {
    return $this->busy;
  }
  public function setErrors($errors) {
    $this->errors = $errors;
  }
  public function getErrors() {
    return $this->errors;
  }
}

class Google_Service_Calendar_FreeBusyGroup
    extends Google_Collection {
  public $calendars;
  protected $__errorsType = 'Google_Service_Calendar_Error';
  protected $__errorsDataType = 'array';
  public $errors;
  public function setCalendars($calendars) {
    $this->calendars = $calendars;
  }
  public function getCalendars() {
    return $this->calendars;
  }
  public function setErrors($errors) {
    $this->errors = $errors;
  }
  public function getErrors() {
    return $this->errors;
  }
}

class Google_Service_Calendar_FreeBusyRequest
    extends Google_Collection {
  public $calendarExpansionMax;
  public $groupExpansionMax;
  protected $__itemsType = 'Google_Service_Calendar_FreeBusyRequestItem';
  protected $__itemsDataType = 'array';
  public $items;
  public $timeMax;
  public $timeMin;
  public $timeZone;
  public function setCalendarExpansionMax($calendarExpansionMax) {
    $this->calendarExpansionMax = $calendarExpansionMax;
  }
  public function getCalendarExpansionMax() {
    return $this->calendarExpansionMax;
  }
  public function setGroupExpansionMax($groupExpansionMax) {
    $this->groupExpansionMax = $groupExpansionMax;
  }
  public function getGroupExpansionMax() {
    return $this->groupExpansionMax;
  }
  public function setItems($items) {
    $this->items = $items;
  }
  public function getItems() {
    return $this->items;
  }
  public function setTimeMax($timeMax) {
    $this->timeMax = $timeMax;
  }
  public function getTimeMax() {
    return $this->timeMax;
  }
  public function setTimeMin($timeMin) {
    $this->timeMin = $timeMin;
  }
  public function getTimeMin() {
    return $this->timeMin;
  }
  public function setTimeZone($timeZone) {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone() {
    return $this->timeZone;
  }
}

class Google_Service_Calendar_FreeBusyRequestItem
    extends Google_Model {
  public $id;
  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
}

class Google_Service_Calendar_FreeBusyResponse
    extends Google_Model {
  protected $__calendarsType = 'Google_Service_Calendar_FreeBusyCalendar';
  protected $__calendarsDataType = 'map';
  public $calendars;
  protected $__groupsType = 'Google_Service_Calendar_FreeBusyGroup';
  protected $__groupsDataType = 'map';
  public $groups;
  public $kind;
  public $timeMax;
  public $timeMin;
  public function setCalendars(Google_Service_Calendar_FreeBusyCalendar$calendars) {
    $this->calendars = $calendars;
  }
  public function getCalendars() {
    return $this->calendars;
  }
  public function setGroups(Google_Service_Calendar_FreeBusyGroup$groups) {
    $this->groups = $groups;
  }
  public function getGroups() {
    return $this->groups;
  }
  public function setKind($kind) {
    $this->kind = $kind;
  }
  public function getKind() {
    return $this->kind;
  }
  public function setTimeMax($timeMax) {
    $this->timeMax = $timeMax;
  }
  public function getTimeMax() {
    return $this->timeMax;
  }
  public function setTimeMin($timeMin) {
    $this->timeMin = $timeMin;
  }
  public function getTimeMin() {
    return $this->timeMin;
  }
}

class Google_Service_Calendar_Setting
    extends Google_Model {
  public $etag;
  public $id;
  public $kind;
  public $value;
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
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
  public function setValue($value) {
    $this->value = $value;
  }
  public function getValue() {
    return $this->value;
  }
}

class Google_Service_Calendar_Settings
    extends Google_Collection {
  public $etag;
  protected $__itemsType = 'Google_Service_Calendar_Setting';
  protected $__itemsDataType = 'array';
  public $items;
  public $kind;
  public function setEtag($etag) {
    $this->etag = $etag;
  }
  public function getEtag() {
    return $this->etag;
  }
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

class Google_Service_Calendar_TimePeriod
    extends Google_Model {
  public $end;
  public $start;
  public function setEnd($end) {
    $this->end = $end;
  }
  public function getEnd() {
    return $this->end;
  }
  public function setStart($start) {
    $this->start = $start;
  }
  public function getStart() {
    return $this->start;
  }
}
