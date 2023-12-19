<?php
    // Include your database connection file
    include_once __DIR__ . '/../php/connection.php';

    // Check if the 'id' GET parameter is set
    if (isset($_GET['emp_id'])) {
        // Get the 'id' GET parameter
        $emp_id = $_GET['emp_id'];

        // Prepare a SQL DELETE statement for the employee table
        $sql = "DELETE FROM employee WHERE emp_id = ?";

        // Prepare a statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $emp_id);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records deleted successfully. Redirect to landing page
                header("location: employee-maintenance.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
?>