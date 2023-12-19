<?php
session_start();

date_default_timezone_set('Asia/Manila');

include_once __DIR__ . '/../php/connection.php';


$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for pm_out
$updatePmOutQuery = "UPDATE atlog SET pm_out = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updatePmOutQuery) === TRUE) {
    echo "PM OUT time logged successfully";

    // Update pm_underTIME column
    $updatePmUnderTimeQuery = "UPDATE atlog SET pm_underTIME = IF(TIMEDIFF(pm_out, '17:59:00') > '00:30:00', 'YES', 'NO')";
    if ($conn->query($updatePmUnderTimeQuery) === TRUE) {
        echo " and PM underTIME status updated successfully";

        // Update status column to 'Offline'
        $employeeStatus = 'Offline';
        $updateStatusQuery = "UPDATE atlog SET status = '$employeeStatus' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";
        if ($conn->query($updateStatusQuery) === TRUE) {
            echo " and status updated to '$employeeStatus'";
        } else {
            echo " but there was an error updating status: " . $conn->error;
        }
    } else {
        echo " but there was an error updating PM underTIME status: " . $conn->error;
    }
} else {
    echo "Error logging PM OUT time: " . $conn->error;
}

$conn->close();
?>
