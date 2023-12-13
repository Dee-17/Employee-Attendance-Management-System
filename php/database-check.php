<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$dbname = "employee_db";

// Create connection
$conn = new mysqli($server_name, $user_name, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
if ($conn->select_db($dbname)) {
    echo "Database exists";
} else {
    echo "Error: " . $conn->error;
}
?>