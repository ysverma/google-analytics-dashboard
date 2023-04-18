<?php

// Set the environment variable for the Google Application Credentials.
putenv('GOOGLE_APPLICATION_CREDENTIALS=../../js/credencial/Dotzoo.com/dotzoo.json');

// Load the required dependencies.
require_once '../../vendor/autoload.php';

// Use the necessary classes from the Google Analytics API.
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;

// Define the GA4 property ID.
$property_id = '308693886';

try {
  // Create a new instance of the Analytics Data API client using the default constructor.
  $client = new BetaAnalyticsDataClient();

  // Make the API call.
  $response = $client->runRealtimeReport([
    'property' => 'properties/' . $property_id,
    'dateRanges' => [
      new DateRange([
        'start_date' => '7daysAgo',
        'end_date' => 'today',
      ]),
    ],
    'dimensions' => [
      new Dimension(['name' => 'country',]),
    ],
    'metrics' => [
      new Metric(['name' => 'activeUsers',]),
    ],
  ]);

  // Print the response as a JSON string.
  echo $response->serializeToJsonString();
} catch (Exception $e) {
  // Log the error message.
  error_log('Error: ' . $e->getMessage());
}

?>
