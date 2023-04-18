<?php
 header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
putenv('GOOGLE_APPLICATION_CREDENTIALS=../../js/credencial/Cascade/cascade.json');//this is your credential file download from your google service account 

require_once '../../vendor/autoload.php';// this is a vendor file create a using composor 

use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;


$property_id = 'xxxxxxxxx'; // GA4 property ID

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

// Using a default constructor instructs the client to use the credentials
// specified in GOOGLE_APPLICATION_CREDENTIALS environment variable.
$client = new BetaAnalyticsDataClient();

// Make an API call.
$response = $client->runReport([
  'property' => 'properties/' . $property_id,
  'dateRanges' => [
    new DateRange([
      'start_date' => $start_date,
      'end_date' => $end_date,
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




