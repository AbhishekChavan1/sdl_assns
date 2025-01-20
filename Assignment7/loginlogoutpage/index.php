<?php
// Start the session
session_start();

// Check if the user is already logged in, redirect to the home page
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sample hardcoded username and password for login
    $username = "admin";
    $password = "password123";

    // Get user input
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Check if the credentials are correct
    if ($input_username === $username && $input_password === $password) {
        // Set session variables
        $_SESSION['username'] = $input_username;

        // Set cookies to remember the user (optional)
        if (isset($_POST['remember'])) {
            setcookie('username', $input_username, time() + (86400 * 30), "/"); // 30 days cookie
        }

        // Redirect to the home page
        header("Location: home.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            padding: 30px;
            text-align: center;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 1rem;
            margin-bottom: 5px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4caf50;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" name="remember" id="remember"> Remember me
                </label>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

