 <?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "analytics_dashboard";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Create connection
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>
