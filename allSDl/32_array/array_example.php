<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array Example</title>
</head>
<body>

<h2>Enter Numbers</h2>

<!-- Form to accept numbers -->
<form method="post" action="array_example.php">
    <label for="numbers">Enter numbers (comma separated): </label>
    <input type="text" id="numbers" name="numbers" placeholder="e.g. 5, 8, 12, 3">
    <input type="submit" value="Submit">
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input numbers as a string and split it into an array
    $numbers_str = $_POST['numbers'];
    $numbers_arr = explode(',', $numbers_str); // Split by commas

    // Clean the array elements to remove extra spaces
    $numbers_arr = array_map('trim', $numbers_arr);

    // Convert the array elements to integers
    $numbers_arr = array_map('intval', $numbers_arr);

    // Sort the array in ascending order
    sort($numbers_arr);

    // Calculate the sum of the numbers
    $sum = array_sum($numbers_arr);

    // Display the sorted numbers and the sum
    echo "<h3>Sorted Numbers:</h3>";
    echo "<p>" . implode(', ', $numbers_arr) . "</p>";

    echo "<h3>Sum of Numbers:</h3>";
    echo "<p>" . $sum . "</p>";
}
?>

</body>
</html>
