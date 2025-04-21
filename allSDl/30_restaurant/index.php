<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Data Entry Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h2>Restaurant Data Entry Form</h2>
    <form id="restaurant-form" method="POST" action="submit.php">
        <table>
            <tr>
                <td><label for="restaurant_name">Restaurant Name:</label></td>
                <td><input type="text" id="restaurant_name" name="restaurant_name" required></td>
            </tr>
            <tr>
                <td><label for="address">Address:</label></td>
                <td><input type="text" id="address" name="address" required></td>
            </tr>
            <tr>
                <td><label for="contact_number">Contact Number:</label></td>
                <td><input type="text" id="contact_number" name="contact_number" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <script src="script.js"></script>
</body>
</html>
