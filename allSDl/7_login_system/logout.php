<?php
session_start();
session_unset();
session_destroy();

// ✅ Clear the cookie if it exists
if (isset($_COOKIE["username"])) {
    setcookie("username", "", time() - 3600, "/"); // Expire it
}

header("Location: index.html");
exit();
?>
