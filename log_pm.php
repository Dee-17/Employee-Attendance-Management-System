<?php
session_start();

date_default_timezone_set('Asia/Manila');

include "connection.php"; 

$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for pm_in
$updatePmInQuery = "UPDATE atlog SET pm_in = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updatePmInQuery) === TRUE) {
    echo "PM time logged successfully";
} else {
    echo "Error logging PM time: " . $conn->error;
}

// Update pm_late column
$updatePmLateQuery = "UPDATE atlog SET pm_late = IF(TIMEDIFF(pm_in, '13:30:00') > '00:30:00', 1, 0)";
$conn->query($updatePmLateQuery);

$conn->close();
?>


