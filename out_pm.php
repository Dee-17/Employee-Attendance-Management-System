<?php
session_start();

date_default_timezone_set('Asia/Manila');

include "connection.php"; 

$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for pm_out
$updatePmOutQuery = "UPDATE atlog SET pm_out = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updatePmOutQuery) === TRUE) {
    echo "PM OUT time logged successfully";
} else {
    echo "Error logging PM OUT time: " . $conn->error;
}

// Update pm_underTIME column
$updatePmUnderTimeQuery = "UPDATE atlog SET pm_underTIME = IF(TIMEDIFF(pm_out, '17:59:00') > '00:30:00', 'YES', 'NO')";
$conn->query($updatePmUnderTimeQuery);


$conn->close();
?>
