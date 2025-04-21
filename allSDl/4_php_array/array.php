<!DOCTYPE html>
<html>
<head>
    <title>Employee Name Search</title>
</head>
<body>
    <h2>Search for an Employee Name</h2>
    <form method="post" action="">
        <label for="name">Enter employee name:</label>
        <input type="text" id="name" name="name" required>
        <input type="submit" value="Search">
    </form>

    <?php
    // Indexed array of employee names
    $employee_names = array(
        "Amit", "Bhavna", "Chetan", "Deepa", "Esha",
        "Farhan", "Gita", "Harsh", "Isha", "Jay",
        "Kiran", "Lakshmi", "Manoj", "Neha", "Omkar",
        "Pooja", "Qasim", "Rita", "Sohan", "Tina"
    );

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_name = trim($_POST["name"]);

        // Search for the name in the array (case-insensitive)
        $found = false;
        foreach ($employee_names as $name) {
            if (strcasecmp($name, $search_name) == 0) {
                $found = true;
                break;
            }
        }

        // Display result
        if ($found) {
            echo "<p style='color:green;'>Employee '$search_name' found in the list.</p>";
        } else {
            echo "<p style='color:red;'>Employee '$search_name' not found in the list.</p>";
        }
    }
    ?>
</body>
</html>
