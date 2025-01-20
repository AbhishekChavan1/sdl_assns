<?php
// Start the session to access the success message
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollreveal/4.0.0/scrollreveal.min.js"></script>
    <style>
        /* Styling the success message */
        .success-message {
            background-color: #66cc66; /* Lighter green */
            color: white;
            padding: 20px; /* Increased padding for more height */
            text-align: center;
            font-size: 20px; /* Slightly larger font */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            width: 100%; /* Ensure it covers the full width */
            display: none; /* Initially hidden */
            opacity: 0; /* Set initial opacity */
            transition: opacity 0.5s ease-in-out; /* Smooth fade-in/fade-out effect */
        }

    </style>
</head>
<body>
    <div class="main-container">
        <h1 class="title">Welcome to Employee Management System</h1>

        <!-- Success Message -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div id="success-message" class="success-message">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <div class="options">
            <a href="employee_form.php" class="button">Register New Employee</a>
            <a href="employee_list.php" class="button">View Existing Employee List</a>
        </div>
    </div>

    <script>
        // Display the success message if it's present
        window.onload = function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                // Fade in the message by changing its opacity
                successMessage.style.display = 'block';
                setTimeout(function() {
                    successMessage.style.opacity = 1; // Fade in
                }, 100); // Small delay before showing

                // Hide the message after 3 seconds
                setTimeout(function() {
                    successMessage.style.opacity = 0; // Fade out
                    setTimeout(function() {
                        successMessage.style.display = 'none'; // Hide after fade-out
                    }, 500); // Wait for fade-out to complete
                }, 3000);
            }
        };
    </script>
</body>
</html>
