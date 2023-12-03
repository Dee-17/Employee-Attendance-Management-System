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

// Function to create table "admin"
function createAdminTable($conn, $db_name) {
    // Check if table exists
    $sql = "SHOW TABLES FROM " . $db_name . " LIKE 'admin'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Create table
        $sql = "CREATE TABLE admin (
            admin_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            name VARCHAR(100) NOT NULL
        )";
        if ($conn->query($sql) === TRUE) {
            echo "Table admin created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Table admin already exists.Inserting Data";
        $sql = "INSERT INTO admin (user_name, password, name) VALUES ('miccch', 'macho123', 'Mitch Gumabao')";
    }

}

// Connect to the specific database
$conn->select_db($db_name);

// Create the table
createAdminTable($conn, $db_name);

$conn->close();
?>