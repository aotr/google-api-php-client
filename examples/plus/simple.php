<?php
require_once '../src/Google/Client.php';
require_once '../src/Google/Service/Plus.php';
session_start();

$client = new Google_Client();
$client->setApplicationName("Google+ PHP Starter Application");

// Visit https://code.google.com/apis/console?api=plus to generate your
// developer key for simple API access.
// $client->setDeveloperKey('insert_your_developer_key_here');
$plus = new Google_Service_Plus($client);

$params = array(
   'orderBy' => 'best',
   'maxResults' => '20',
 );
$results = $plus->activities->search('Google+ API', $params);
foreach($results['items'] as $result) {
  print "Search Result: <pre>{$result['object']['content']}</pre>\n";
}