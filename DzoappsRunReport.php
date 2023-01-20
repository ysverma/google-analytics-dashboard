<?php
putenv('GOOGLE_APPLICATION_CREDENTIALS=../js/credencial/key.json');

require_once '../vendor/autoload.php';

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;


$property_id = '310444740'; // GA4 property ID

// Using a default constructor instructs the client to use the credentials
// specified in GOOGLE_APPLICATION_CREDENTIALS environment variable.
$client = new BetaAnalyticsDataClient();

// Make an API call.
$response = $client->runReport([
  'property' => 'properties/' . $property_id,
  'dateRanges' => [
    new DateRange([
      'start_date' => '30daysAgo',
      'end_date' => 'today',
    ]),
  ],
  'dimensions' => [
    new Dimension(['name' => 'country',]),
  ],
  'metrics' => [
     new Metric(['name' => 'totalusers',]),
    ],
  ]);
  echo $response->serializeToJsonString(); // Prints JSON string




