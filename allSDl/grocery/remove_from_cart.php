<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['product_id']);
    if (isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array_diff($_SESSION['cart'], [$id]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}
header('Location: cart.php');
exit();
?>