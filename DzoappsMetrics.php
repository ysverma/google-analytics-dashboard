<?php
putenv('GOOGLE_APPLICATION_CREDENTIALS=../js/credencial/key.json');

require_once '../vendor/autoload.php';

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
// use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;

$client = new BetaAnalyticsDataClient();

$property_id = '310444740'; // GA4 property ID

$response = $client->runReport([
  'property' => 'properties/' . $property_id,
  'dateRanges' => [
    new DateRange([
      'start_date' => '30daysAgo',
      'end_date' => 'today',
    ]),
  ],
  'metrics' => [
    new Metric(['name' => 'totalusers',]),
    new Metric(['name' => 'screenPageViews',]),
    new Metric(['name' => 'averageSessionDuration',]),
    new Metric(['name' => 'bounceRate',]),
  ],
]);

echo $response->serializeToJsonString(); 
?>