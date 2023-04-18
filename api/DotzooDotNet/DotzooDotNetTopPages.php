<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  putenv('GOOGLE_APPLICATION_CREDENTIALS=../../js/credencial/Dotzoo.net/DotzooDotNet.json');

  require_once '../../vendor/autoload.php';

  use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
  use Google\Analytics\Data\V1beta\DateRange;
  use Google\Analytics\Data\V1beta\Dimension;
  use Google\Analytics\Data\V1beta\Metric;

  $property_id = '308695635'; 

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
       new Dimension(['name' => 'pageTitle',]),
       new Dimension(['name' => 'fullPageUrl',]),
   
  ],
  'metrics' => [
      new Metric(['name' => 'screenPageViews',]),
    ],
  ]);
  
  echo $response->serializeToJsonString();

?>