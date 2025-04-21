<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook Clone - Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">facebook</div>
    <input type="text" placeholder="Search Facebook" class="search-bar">
    <div class="user-section">
        <span><?php echo htmlspecialchars($user['name']); ?></span>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</nav>

<!-- Page Layout -->
<div class="main-container">
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <ul>
            <li>🏠 Home</li>
            <li>👥 Friends</li>
            <li>📷 Photos</li>
            <li>🎥 Videos</li>
        </ul>
    </aside>

    <!-- Center Feed -->
    <main class="feed">
        <h2>News Feed</h2>
        <div class="post">
            <p><strong><?php echo htmlspecialchars($user['name']); ?></strong> posted an update!</p>
            <p>Hello everyone! This is my first post on Facebook clone 😄</p>
        </div>
        <div class="post">
            <p><strong>Admin</strong> says:</p>
            <p>Welcome to your personalized homepage.</p>
        </div>
    </main>

    <!-- Right Sidebar -->
    <aside class="contacts">
        <h3>Contacts</h3>
        <p>John Doe</p>
        <p>Jane Smith</p>
    </aside>
</div>

</body>
</html>
