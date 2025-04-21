<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Validation Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>User Data Validation Form</h2>
    <form id="user-form" method="POST" onsubmit="return validateForm()">
        <div>
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter full name" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required>
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Enter address" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
