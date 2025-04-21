<?php
session_start();

// ✅ Check session or cookie
if (!isset($_SESSION["username"])) {
    if (isset($_COOKIE["username"])) {
        $_SESSION["username"] = $_COOKIE["username"];
    } else {
        header("Location: index.html");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body>
  <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
  <a href="logout.php">Logout</a>
</body>
</html>
