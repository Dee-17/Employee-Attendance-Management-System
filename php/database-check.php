<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "employee_db";

// Create connection
$conn = new mysqli($server_name, $user_name, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$sql = "SHOW DATABASES LIKE '" . $db_name . "'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Create database
    $sql = "CREATE DATABASE " . $db_name;
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
} else {
    echo "Database already exists";
}

$conn->close();
?>