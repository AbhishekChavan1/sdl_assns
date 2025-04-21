<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Catalogue</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to the Bookstore</h1>
    <div class="catalogue">
        <?php
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
            while($book = $result->fetch_assoc()):
        ?>
        <div class="book-card">
            <img src="images/<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>">
            <h3><?php echo $book['title']; ?></h3>
            <p><strong>Author:</strong> <?php echo $book['author']; ?></p>
            <p><strong>Genre:</strong> <?php echo $book['genre']; ?></p>
            <p><strong>Price:</strong> ₹<?php echo $book['price']; ?></p>
        </div>
        <?php endwhile;
        else: ?>
        <p>No books found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
