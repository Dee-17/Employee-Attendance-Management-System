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
        echo "Table admin already exists. Proceeding to insert data...";
        $sql = "INSERT INTO admin (user_name, password, name) VALUES ('miccch', 'macho123', 'Mitch Gumabao'),
                                                                     ('archiee','mekusmekus','Archie Arjon'),
                                                                     ('lowsie','mahinahina','Lucy Incan'),
                                                                     ('user1','user123','User')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    }

}

// Function to create table "user"
function createUserTable($conn, $db_name) {
    // Check if table exists
    $sql = "SHOW TABLES FROM " . $db_name . " LIKE 'user'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        // Create table
        $sql = "CREATE TABLE user (
            user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            name VARCHAR(100) NOT NULL
        )";
        if ($conn->query($sql) === TRUE) {
            echo "Table user created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Table user already exists. Proceeding to insert data...";
        $sql = "INSERT INTO user (user_name, password, name) VALUES ('johndoe', 'john123', 'John Doe'),
                                                                     ('jane123','jane123','Jane Doe'),
                                                                     ('samuel24','samuel123','Samuel Smith'),
                                                                     ('user2','user123','User')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
    }

}

// Connect to the specific database
$conn->select_db($db_name);

// Create the admin table
createAdminTable($conn, $db_name);

// Create the user table
createUserTable($conn, $db_name);

$conn->close();
?>