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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a unique verification code
    $verification_code = md5(uniqid(rand(), true));

    // Insert into database
    $sql = "INSERT INTO users (email, verification_code) VALUES ('$email', '$verification_code')";
    if ($conn->query($sql) === TRUE) {
        // Show verification link directly
        echo "<h3>Verification link (for testing):</h3>";
        echo "Click <a href='http://localhost/28_emaiverify/verify.php?code=$verification_code'>here</a> to verify your email.";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
