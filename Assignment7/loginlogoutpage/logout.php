<?php
// Start the session
session_start();

// Destroy the session to log the user out
session_destroy();

// Remove the remember me cookie if it exists
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, '/'); // Expire the cookie
}

// Redirect to the login page after logging out
header("Location: index.php");
exit();
?>
