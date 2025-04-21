<?php
session_start();
$id = $_GET['id'];

// Remove item from the cart
if (isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array_diff($_SESSION['cart'], [$id]);
}

header("Location: cart.php");
exit();
