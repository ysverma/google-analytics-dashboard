<?php
// Establish a database connection
$conn = new mysqli("localhost", "dotzoo_analytics_dashboard", "@O7+qplhpM&9", "dotzoo_analytics_dashboard");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ID of the user to be deleted
$id = $_GET['id'];

// Prepare and execute the DELETE query
$q = "DELETE FROM `users` WHERE id = $id";
if ($conn->query($q) === TRUE) {
    // Redirect to the user list page with a success message
    echo "<script>alert('Record deleted from database')</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=https://analyticsdashboard.dotzoo.net/admin/UserList.php'>";
} else {
    // Display an error message
    echo "<script>alert('Failed to delete from database')</script>";
}

// Close the database connection
$conn->close();
?>
