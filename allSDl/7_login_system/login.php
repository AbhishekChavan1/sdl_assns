<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Note: For production, use password_hash()

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["username"] = $username;

        // ✅ Set cookie if 'Remember Me' is checked
        if (isset($_POST["remember"])) {
            setcookie("username", $username, time() + (86400 * 7), "/"); // 7 days
        }

        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
