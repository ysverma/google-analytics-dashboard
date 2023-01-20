<?php
putenv('GOOGLE_APPLICATION_CREDENTIALS=../js/credencial/key.json');

require_once '../vendor/autoload.php';

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;


$property_id = '310444740'; 

$client = new BetaAnalyticsDataClient();

// Make an API call.
$response = $client->runReport([
  'property' => 'properties/' . $property_id,
  'dateRanges' => [
    new DateRange([
      'start_date' => '7daysAgo',
      'end_date' => 'today',
    ]),
  ],
  'dimensions' => [
       new Dimension(['name' => 'pageTitle',]),
       new Dimension(['name' => 'fullPageUrl',]),
   
  ],
  'metrics' => [
      new Metric(['name' => 'screenPageViews',]),
    ],
  ]);
  echo $response->serializeToJsonString();

?>