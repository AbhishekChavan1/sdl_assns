<?php
// Include the database connection
include 'config.php';

// Start the session
session_start();

// Function to handle error if table does not exist
function handleError($conn) {
    echo json_encode(['status' => 'error', 'message' => 'The table "employees" does not exist. Please create the table first.']);
    exit();
}

// Get form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$department = $_POST['department'];
$salary = $_POST['salary'];

// Check if the 'employees' table exists
$tableCheckQuery = "SHOW TABLES LIKE 'employees'";
$tableCheckResult = $conn->query($tableCheckQuery);

if ($tableCheckResult->num_rows == 0) {
    // Table doesn't exist, handle the error
    handleError($conn);
}

// Check if email already exists in the 'employees' table
$checkEmailQuery = "SELECT * FROM employees WHERE email = ?";
$stmt = $conn->prepare($checkEmailQuery);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Email exists, update the record
    $updateQuery = "UPDATE employees SET name = ?, phone = ?, position = ?, department = ?, salary = ? WHERE email = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ssssds', $name, $phone, $position, $department, $salary, $email);
    $stmt->execute();

    // Set the success message in the session
    $_SESSION['success_message'] = 'Employee details updated successfully!';
    // Send success response in JSON format
    echo json_encode(['status' => 'success', 'message' => 'Employee details updated successfully!']);
} else {
    // Email doesn't exist, insert a new employee record
    $insertQuery = "INSERT INTO employees (name, email, phone, position, department, salary) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('sssssd', $name, $email, $phone, $position, $department, $salary);
    $stmt->execute();

    // Set the success message in the session
    $_SESSION['success_message'] = 'Employee registered successfully!';
    // Send success response in JSON format
    echo json_encode(['status' => 'success', 'message' => 'Employee registered successfully!']);
}

exit();
?>
