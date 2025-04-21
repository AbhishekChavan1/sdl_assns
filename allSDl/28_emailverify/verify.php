<?php
// Database connection (Use your own credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "email_verification_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['code'])) {
    $verification_code = $_GET['code'];

    // Check if the verification code exists in the database
    $sql = "SELECT * FROM users WHERE verification_code='$verification_code' AND is_verified=0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update user status to verified
        $update_sql = "UPDATE users SET is_verified=1 WHERE verification_code='$verification_code'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Email successfully verified!";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Invalid or already verified verification code.";
    }
} else {
    echo "No verification code provided.";
}

$conn->close();
?>
