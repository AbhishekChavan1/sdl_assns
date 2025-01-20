<?php
// Start the session
session_start();

// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Check if the user has opted to remember their login through cookies
if (isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            width: 80%;
            height: 70vh;
            padding: 30px;
            display: flex; /* Add this to enable flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            text-align: center;
        }

        .text-wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 80%;
            padding: 30px;
            text-align: center;
        }


        h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            background: #4caf50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-wrapper">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>We're glad to have you back. Explore our services or log out when you're ready.</p>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
