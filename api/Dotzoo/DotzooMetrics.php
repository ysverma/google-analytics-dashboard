<?php

// Set the environment variable for the Google credentials file
putenv('GOOGLE_APPLICATION_CREDENTIALS=../../js/credencial/Dotzoo.com/dotzoo.json');

// Load the required dependencies
require_once '../../vendor/autoload.php';

// Use the necessary classes from the Google Analytics API client
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Metric;

// Set the response headers to allow cross-origin requests
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');

try {
  // Create a new Google Analytics API client
  $client = new BetaAnalyticsDataClient();

  // Set the GA4 property ID
  $property_id = '308693886';
  
// Connect to the database
include "../Database/DbConfig.php";

// Fetch start date and end date from the database
$sql = "SELECT start_date, end_date FROM date_range WHERE id = 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
  die("Error fetching date range: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
$start_date = $row['start_date'];
$end_date = $row['end_date'];

mysqli_close($conn);

  // Run the report for the given date range and metrics
  $response = $client->runReport([
    'property' => 'properties/' . $property_id,
    'dateRanges' => [
      new DateRange([
        'start_date' => $start_date,
      'end_date' => $end_date,
      ]),
    ],
    'metrics' => [
      new Metric(['name' => 'totalusers',]),
      new Metric(['name' => 'screenPageViews',]),
      new Metric(['name' => 'averageSessionDuration',]),
      new Metric(['name' => 'bounceRate',]),
    ],
  ]);

  // Output the report as a JSON string
  echo $response->serializeToJsonString();
} catch (Exception $e) {
  // Catch any exceptions and print an error message
  echo 'Error: ' . $e->getMessage();
}

?>
