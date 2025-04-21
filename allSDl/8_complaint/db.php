
<?php
$host = "localhost";
$user = "root";  // Default MySQL user
$pass = "";  // Default MySQL password (empty for XAMPP)
$db = "complaint_db";  // Your database name

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
