<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Load the Google API PHP Client Library.
require_once '../../vendor/autoload.php';

use Google\Client;
use Google\Service\SearchConsole;
use Google\Service\SearchConsole\SearchAnalyticsQueryRequest;

$site = "https://ie-rm.org/";

$KEY_FILE_LOCATION ='../../js/credencial/IERM/ierm.json';

putenv('GOOGLE_APPLICATION_CREDENTIALS=../../js/credencial/IERM/ierm.json');
putenv("GOOGLE_APPLICATION_CREDENTIALS=$KEY_FILE_LOCATION");

// Establish a database connection
$servername = "localhost";
$username = "dotzoo_analytics_dashboard";
$password = "@O7+qplhpM&9";
$dbname = "dotzoo_analytics_dashboard";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve start date and end date from database
$sql = "SELECT start_date, end_date FROM date_range WHERE id = 1"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $startDate = $row["start_date"];
        $endDate = $row["end_date"];
    }
} else {
    echo "No results found in database.";
}

mysqli_close($conn);

$client = new Google\Client();
$client->setAuthConfig($KEY_FILE_LOCATION);
$client->setApplicationName("ierm");
$client->addScope("https://www.googleapis.com/auth/webmasters.readonly");

$searchConsole = new SearchConsole($client);

$queryRequest = new SearchAnalyticsQueryRequest();
$queryRequest->setStartDate($startDate);
$queryRequest->setEndDate($endDate);
$queryRequest->setDimensions(["query"]);
$queryRequest->setSearchType('web');

$response = $searchConsole->searchanalytics->query($site, $queryRequest);

$siteData = [];

foreach ($response as $row) {
    $siteData[] = [
        "query" => $row->keys[0],
        // "page" => $row->keys[1],
        // "date" => $row->keys[2],
        "clicks" => $row->clicks,
        "ctr" => $row->ctr,
        "impressions" => $row->impressions,     
        "position" => $row->position,
    ];
}

$json = json_encode($siteData); 
echo($json);
?>
