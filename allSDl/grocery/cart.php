<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Your Cart</h1>
<div class="container">
<?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $ids = implode(",", array_map('intval', $_SESSION['cart']));
    $result = $conn->query("SELECT * FROM products WHERE id IN ($ids)");

    while ($row = $result->fetch_assoc()) {
?>
    <div class="product">
        <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
        <h3><?= $row['name'] ?></h3>
        <p>₹<?= $row['price'] ?></p>
        <form method="POST" action="remove_from_cart.php">
            <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
            <button type="submit" class="remove-btn">Remove</button>
        </form>
    </div>
<?php
    }
} else {
    echo "<p>Your cart is empty!</p>";
}
?>
</div>
<a href="index.php" class="cart-link">← Back to Products</a>
</body>
</html>