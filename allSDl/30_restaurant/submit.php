<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $restaurant_name = htmlspecialchars($_POST['restaurant_name']);
    $address = htmlspecialchars($_POST['address']);
    $contact_number = htmlspecialchars($_POST['contact_number']);

    // Display the entered data
    echo "<h2>Restaurant Data Submitted</h2>";
    echo "<p><strong>Restaurant Name:</strong> " . $restaurant_name . "</p>";
    echo "<p><strong>Address:</strong> " . $address . "</p>";
    echo "<p><strong>Contact Number:</strong> " . $contact_number . "</p>";
} else {
    // Redirect back to the form if the form is not submitted correctly
    header("Location: index.html");
    exit();
}
?>
