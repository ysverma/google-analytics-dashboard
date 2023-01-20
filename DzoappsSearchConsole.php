<?php

// Load the Google API PHP Client Library.
require_once '../vendor/autoload.php';

use Google\Client;
use Google\Service\SearchConsole;
use Google\Service\SearchConsole\SearchAnalyticsQueryRequest;

$site = "https://www.dzoapps.com/";

$KEY_FILE_LOCATION ='../js/credencial/key.json';

putenv("GOOGLE_APPLICATION_CREDENTIALS=$KEY_FILE_LOCATION");

$client = new Google\Client();
// I don't think this is really necessary as the environment variable is already set.
$client->setAuthConfig($KEY_FILE_LOCATION);
$client->setApplicationName("quick");
$client->addScope("https://www.googleapis.com/auth/webmasters.readonly");

$searchConsole = new SearchConsole($client);
//print_r($searchConsole);
$queryRequest = new SearchAnalyticsQueryRequest();
$queryRequest->setStartDate("2022-12-13");
$queryRequest->setEndDate("2022-12-21");
$queryRequest->setDimensions(["QUERY","page","date"]);
$queryRequest->setSearchType('web');

$response = $searchConsole->searchanalytics->query($site, $queryRequest);
// print_r($response);

$siteData = [];

foreach ($response as $row) {

    $siteData[] = [

            "query" => $row->keys[0],
            "page" => $row->keys[1],
            "date" => $row->keys[2],
            "clicks" => $row->clicks,
            "ctr" => $row->ctr,
            "impressions" => $row->impressions,     
            "position" => $row->position,
        
        ];
          
    }


$json = json_encode($siteData); 
  
// Display the output 
echo($json); 
 
