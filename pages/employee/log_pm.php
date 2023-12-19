<?php
session_start();

date_default_timezone_set('Asia/Manila');

include_once __DIR__ . '/../php/connection.php';


$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for pm_in
$updatePmInQuery = "UPDATE atlog SET pm_in = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updatePmInQuery) === TRUE) {
    echo "PM time logged successfully";

    // Update pm_late column
    $updatePmLateQuery = "UPDATE atlog SET pm_late = IF(TIMEDIFF(pm_in, '13:30:00') > '00:30:00', 'YES', 'NO')";
    if ($conn->query($updatePmLateQuery) === TRUE) {
        echo " and PM late status updated successfully";

        // Update status column to 'Offline'
        $employeeStatus = 'Online'; 
        $updateStatusQuery = "UPDATE atlog SET status = '$employeeStatus' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";
        if ($conn->query($updateStatusQuery) === TRUE) {
            echo " and status updated to '$employeeStatus'";
        } else {
            echo " but there was an error updating status: " . $conn->error;
        }
    } else {
        echo " but there was an error updating PM late status: " . $conn->error;
    }
} else {
    echo "Error logging PM time: " . $conn->error;
}

$conn->close();
?>


