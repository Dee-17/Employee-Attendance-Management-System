<?php
session_start();

date_default_timezone_set('Asia/Manila');

include_once __DIR__ . '/../php/connection.php';


$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for am_in
$updateAmInQuery = "UPDATE atlog SET am_in = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updateAmInQuery) === TRUE) {
    echo "AM time logged successfully";

    // Update am_late column
    $updateAmLateQuery = "UPDATE atlog SET am_late = IF(TIMEDIFF(am_in, '8:30:00') > '00:30:00', 'YES', 'NO')";
    if ($conn->query($updateAmLateQuery) === TRUE) {
        echo " and AM late status updated successfully";

        // Update status column
        $employeeStatus = 'Online'; 
        $updateStatusQuery = "UPDATE atlog SET status = '$employeeStatus' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";
        if ($conn->query($updateStatusQuery) === TRUE) {
            echo " and status updated to '$employeeStatus'";
        } else {
            echo " but there was an error updating status: " . $conn->error;
        }
    } else {
        echo " but there was an error updating AM late status: " . $conn->error;
    }
} else {
    echo "Error logging AM time: " . $conn->error;
}

$conn->close();
?>

