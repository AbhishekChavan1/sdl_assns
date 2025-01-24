<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array Demonstration</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            overflow: hidden;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://via.placeholder.com/1920x1080/444') no-repeat center center;
            background-size: cover;
            z-index: -1;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            margin-top: 70px;
            padding: 20px;
            text-align: center;
        }

        .main-heading {
            font-size: 3rem;
            font-weight: bold;
            color: #f8f9fa;
            margin-bottom: 40px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            font-size: 20px;
            font-weight: bold;
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
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }

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
<div class="background"></div>

<div class="container">
    <div class="main-heading">Search Employee</div>

    <div class="grid-container">
        <!-- Single-dimensional array search functionality -->
        <div class="card">
            <h2>Search by Name (1D Array)</h2>
            <form method="post">
                <input type="text" class="form-control" name="single_name" placeholder="Enter Name" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <?php
            $single_array = ["Rupesh Poudel", "Ghanashyam Puri", "Sameer Khatiwada", "John Doe", "Jane Smith", "Michael Johnson", "Emily Davis", "Rajesh Sharma", "Sita Thapa", "Ram Bahadur", "Krishna Karki", "Pooja Shrestha"];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['single_name'])) {
                $search_name = strtolower($_POST['single_name']);
                $found = false;
                foreach ($single_array as $name) {
                    if (strtolower($name) === $search_name) {
                        echo "<p class='message text-success'>" . htmlspecialchars($name) . " found!</p>";
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    echo "<p class='message text-danger'>" . htmlspecialchars($_POST['single_name']) . " not found.</p>";
                }
            }
            ?>
        </div>

        <!-- Multidimensional array search by ID functionality -->
        <div class="card">
            <h2>Search by ID (3D Array)</h2>
            <form method="post">
                <input type="number" class="form-control" name="employee_id" placeholder="Enter Employee ID" required>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <?php
            $multi_array = [
                [
                    "id" => 1,
                    "details" => ["name" => "Rupesh Poudel", "role" => "Software Engineer", "department" => "IT"]
                ],
                [
                    "id" => 2,
                    "details" => ["name" => "Ghanashyam Puri", "role" => "Project Manager", "department" => "Operations"]
                ],
                [
                    "id" => 3,
                    "details" => ["name" => "Sameer Khatiwada", "role" => "Intern", "department" => "HR"]
                ],
                [
                    "id" => 4,
                    "details" => ["name" => "Rajesh Sharma", "role" => "Accountant", "department" => "Finance"]
                ],
                [
                    "id" => 5,
                    "details" => ["name" => "Sita Thapa", "role" => "Marketing Executive", "department" => "Marketing"]
                ]
            ];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employee_id'])) {
                $search_id = intval($_POST['employee_id']);
                $found = false;
                foreach ($multi_array as $employee) {
                    if ($employee['id'] === $search_id) {
                        echo "<p class='message text-success'>ID: " . $employee['id'] . "<br>Name: " . $employee['details']['name'] . "<br>Role: " . $employee['details']['role'] . "<br>Department: " . $employee['details']['department'] . "</p>";
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    echo "<p class='message text-danger'>Employee with ID " . htmlspecialchars($search_id) . " not found.</p>";
                }
            }
            ?>
        </div>

        <!-- Associative array key-value display -->
        <div class="card">
            <h2>Associative Display (Key-Value Pairs)</h2>
            <?php
            $assoc_array = [
                "Software Engineer" => "Rupesh Poudel",
                "Project Manager" => "Ghanashyam Puri",
                "Intern" => "Sameer Khatiwada",
                "Accountant" => "Rajesh Sharma",
                "Marketing Executive" => "Sita Thapa"
            ];
            echo "<table class='table table-dark table-striped'>";
            echo "<thead><tr><th>Role</th><th>Name</th></tr></thead><tbody>";
            foreach ($assoc_array as $role => $name) {
                echo "<tr><td>" . htmlspecialchars($role) . "</td><td>" . htmlspecialchars($name) . "</td></tr>";
            }
            echo "</tbody></table>";
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>