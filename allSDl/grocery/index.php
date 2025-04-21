<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Grocery Store</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function addedAlert() {
            alert("Product added to cart!");
        }
    </script>
</head>
<body>
<h1>Welcome to Grocery Store</h1>
<a href="cart.php" class="cart-link">🛒 Go to Cart</a>
<div class="container">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
    ?>
        <div class="product">
            <img src="<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
            <h3><?= $row['name'] ?></h3>
            <p>₹<?= $row['price'] ?></p>
            <form method="POST" action="add_to_cart.php" onsubmit="addedAlert()">
                <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                <button type="submit">Add to Cart</button>
            </form>
        </div>
    <?php } ?>
</div>
</body>
</html>