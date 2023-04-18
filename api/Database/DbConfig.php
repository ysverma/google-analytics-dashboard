 <?php
$hostName = "localhost";
$dbUser = "dotzoo_analytics_dashboard";
$dbPassword = "@O7+qplhpM&9";
$dbName = "dotzoo_analytics_dashboard";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

// Create connection
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $hostName = "localhost";
// $dbUser = "dotzoo_analytics_dashboard";
// $dbPassword = "@O7+qplhpM&9";
// $dbName = "dotzoo_analytics_dashboard";
// $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
// if (!$conn) {
//     die("Something went wrong;");
// }




// $db_host = "localhost";
// $db_user = "dotzoo_analytics_dashboard";
// $db_password = "@O7+qplhpM&9";
// // $db_name = "dotzoo_analytics_dashboard";


// try {
//   $db = new PDO("mysql:host=$db_host;dbname=dotzoo_analytics_dashboard", $db_user, $db_password);
//   // set the PDO error mode to exception
//   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  // echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }
?>