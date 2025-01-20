<?php
// Assuming you have an existing database connection established
include('config.php');

// Fetch employee data from the database
$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(0, 193, 231),rgb(0, 193, 231)); /* Smooth gradient background */
            color: white;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .employee-list-wrapper {
            width: 100%;
            max-width: 1200px;
            height: 90%;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .table-wrapper {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            flex-grow: 1;
            overflow: hidden;
        }

        .employee-list-table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }

        .employee-list-table thead th {
            text-align: center;
            text-transform: uppercase;
            padding: 10px 15px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            font-weight: 600;
            border: 1px solid #ddd;
        }

        .employee-list-table td {
            text-align: center;
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: #f8f9fa;
            color: #333;
            word-wrap: break-word;
        }

        .employee-list-table tbody {
            display: block;
            max-height: 500px;
            overflow-y: auto;
            width: 100%;
        }

        .employee-list-table thead, .employee-list-table tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .employee-list-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .view-btn, .delete-btn {
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            transition: background-color 0.3s ease;
        }

        .view-btn {
            background-color: #28a745;
        }

        .view-btn:hover {
            background-color: #218838;
        }

        .delete-btn {
            background-color: #dc3545;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .back-button-container {
            margin-top: 10px;
            text-align: center;
        }

        .back-btn {
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 15px;
            font-size: 1.2rem;
            width: 100%;
            border-radius: 50px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .back-btn:hover {
            background: rgba(2, 0, 0);
            transform: translateY(-5px);
        }

        .back-btn:active {
            transform: translateY(2px);
        }

        @media (max-width: 768px) {
            .employee-list-wrapper {
                width: 90%;
                padding: 20px;
            }

            .employee-list-table th, .employee-list-table td {
                padding: 8px;
            }

            .back-btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="employee-list-wrapper">
        <div class="table-wrapper">
            <table class="employee-list-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr id="row-<?php echo $row['id']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['position']; ?></td>
                            <td>
                                <button class="delete-btn" onclick="deleteEmployee(<?php echo $row['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
        <div class="back-button-container">
            <button class="back-btn" onclick="window.history.back()">Back</button>
        </div>
    </div>

    <script>
        function viewEmployee(id) {
            window.location.href = 'employee_list.php?id=' + id;
        }

        function deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                // Send an AJAX request to the server to delete the record
                fetch('delete_employee.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: id }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.status === 'success') {
                            // Dynamically remove the row from the table
                            const row = document.getElementById(`row-${id}`);
                            if (row) {
                                row.remove();
                            }
                        } else {
                            alert('Failed to delete: ' + data.message);
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the employee');
                    });
            }
        }


    </script>
</body>
</html>
