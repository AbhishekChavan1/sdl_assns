<?php
include "db_conn.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];

$sql = "INSERT INTO employees (name, email, phone, department) VALUES ('$name', '$email', '$phone', '$department')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Employee registered successfully.<br><a href='view.php'>View All Employees</a>";
} else {
    echo "❌ Error: " . $conn->error;
}

$conn->close();
?>
