<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'ecommerce');

// Check for connection errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Get products in the cart
$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$products = [];

if (!empty($cartItems)) {
    $ids = implode(",", array_map('intval', $cartItems));
    $result = $conn->query("SELECT * FROM ecommerce_products WHERE id IN ($ids)");

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Calculate the total price
$totalPrice = 0;
foreach ($products as $product) {
    $totalPrice += $product['price'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Shopping Cart</h1>
    <div class="cart-container">
        <?php if (empty($products)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><img src="<?= $product['image'] ?>" width="80" /></td>
                        <td><?= $product['name'] ?></td>
                        <td>₹<?= $product['price'] ?></td>
                        <td><a href="remove_from_cart.php?id=<?= $product['id'] ?>" class="btn-remove">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <h3>Total: ₹<?= $totalPrice ?></h3>
        <?php endif; ?>
    </div>
    <a href="index.php" class="btn-cart">Continue Shopping</a>
</body>
</html>
