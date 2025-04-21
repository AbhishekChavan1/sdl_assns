<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'ecommerce');

// Check for connection errors
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Get products from the database
$result = $conn->query("SELECT * FROM ecommerce_products ");

// Check if there are any products in the cart
$cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce store</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>Ecommerce Store</h1>
        <a href="cart.php" class="btn-cart">Cart (<?= $cart_count ?>)</a>
    </header>

    <div class="product-container">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>" />
                <h3><?= $row['name'] ?></h3>
                <p><strong>Category:</strong> <?= $row['category'] ?></p>
                <p><strong>Price:</strong> ₹<?= $row['price'] ?></p>
                <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn" onclick="showPopup('<?= $row['name'] ?>')">Add to Cart</a>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <p id="popup-message"></p>
        </div>
    </div>
</body>
</html>
