<?php
// Start the session at the beginning of the PHP script
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Search</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .form-container {
            background-color: #444;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
            width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            margin-bottom: 20px;
            color: #f8f9fa;
        }
        .form-control {
            background-color: #555;
            color: #fff;
            border-radius: 5px;
            border: none;
            margin-bottom: 15px;
            padding: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        /* Fade in animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="form-container shadow-lg">
        <h2>Search Employee</h2>
        <form method="post">
            <div class="mb-3">
                <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Enter Employee Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php
        // Indexed array of employee names
        $employee_names = array(
            "John Doe", "Jane Smith", "Michael Johnson", "Emily Davis", "Chris Lee",
            "Sarah Brown", "David Wilson", "Anna Thomas", "Daniel Harris", "Sophie Martin",
            "Matthew Garcia", "Olivia Miller", "James Lee", "Isabella Allen", "Lucas Scott",
            "Charlotte King", "Henry Harris", "Sophia Clark", "Liam Wright", "Rupesh Poudel",
            "Kiran Puri", "Sameer Khatiwada", "Sagar Pariyar", "Aditya Giri", "Ghanashyam Puri",
            "Mandip Bhattarai", "Amit Thakur", "Ranjit Chaudhary", "Abisesh Mishra", "Roshan Yadav",
            "Karan Roy", "Shubah Adav", "John", "Jane", "Michael", "Emily", "Chris", "Sarah", "David", "Anna", "Daniel", "Sophie",
            "Matthew", "Olivia", "James", "Isabella", "Lucas",
            "Charlotte", "Henry", "Sophia", "Liam", "Rupesh",
            "Kiran", "Sameer", "Sagar", "Aditya", "Ghanashyam",
            "Mandip", "Amit", "Ranjit", "Abisesh", "Roshan",
            "Karan", "Shubah", "Rupesh"
        
        );

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search_name = $_POST['employee_name'];

            // Search for the name in the array
            if (in_array($search_name, $employee_names)) {
                $_SESSION['message'] = "<p class='message text-success'>Employee '$search_name' found!</p>";
            } else {
                $_SESSION['message'] = "<p class='message text-danger'>Employee '$search_name' not found.</p>";
            }

            // Redirect to clear the POST data
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        // Display the message if available and then clear it
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']); // Clear the message after displaying it
        }
        ?>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
