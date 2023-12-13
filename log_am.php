<?php
session_start();

date_default_timezone_set('Asia/Manila');

include "connection.php"; 

$empId = $_SESSION['emp_id'];

// Get the current date and time
$currentDateTime = date('H:i:s');

// Update the atlog table with the current time for am_in
$updateAmInQuery = "UPDATE atlog SET am_in = '$currentDateTime' WHERE emp_id = $empId AND atlog_DATE = CURDATE()";

if ($conn->query($updateAmInQuery) === TRUE) {
    echo "AM time logged successfully";
} else {
    echo "Error logging AM time: " . $conn->error;
}

// Update am_late column
$updateAmLateQuery = "UPDATE atlog SET am_late = IF(TIMEDIFF(am_in, '8:30:00') > '00:30:00', 1, 0)";
$conn->query($updateAmLateQuery);

$conn->close();
?>

