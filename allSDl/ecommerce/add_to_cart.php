<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'grocery');

// Check for database connection errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

$id = $_GET['id'];

// Initialize cart if it's not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if the product is already in the cart
if (in_array($id, $_SESSION['cart'])) {
    // If already in the cart, remove it
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$id]);
} else {
    // If not in the cart, add it
    $_SESSION['cart'][] = $id;
}

// Redirect back to the previous page
header("Location: index.php");
exit();
