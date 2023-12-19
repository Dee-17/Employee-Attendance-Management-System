<?php
    // Start the session
    session_start();

    include_once __DIR__ . '/../php/connection.php';

    $empId = $_SESSION['emp_id']; 

    // Query to check for previous entry
    $checkPreviousEntryQuery = "SELECT atlog.atlog_id, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, employee.shift, employee.emp_id, employee.contract, employee.first_name, employee.middle_name, employee.last_name
                                FROM atlog 
                                JOIN employee ON atlog.emp_id = employee.emp_id
                                WHERE atlog.emp_id = $empId AND atlog.atlog_DATE = CURDATE()";

    $result = $conn->query($checkPreviousEntryQuery);

    $employeeShift = '';
    echo '<script>console.log("aaa");</script>';

    // Check if there are any results
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $employeeFullName = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
        $employeeShift = $row['shift'];
        $employeeContract =$row['contract'];

        echo '<script>console.log(num_rows);</script>';

    } else {
        // Retrieve employee full name from the employee table using the employee ID
        $getEmployeeNameQuery = "SELECT first_name, middle_name, last_name FROM employee WHERE emp_id = $empId";
        $employeeNameResult = $conn->query($getEmployeeNameQuery);
    
        if ($employeeNameResult->num_rows > 0) {
            $row = $employeeNameResult->fetch_assoc();
            $employeeFullName = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];

            // Create a new entry in the atlog table using the emp_id if it does not exist yet
            $createNewEntryQuery = "INSERT INTO atlog (emp_id, atlog_DATE) VALUES ($empId, CURDATE())";
            if ($conn->query($createNewEntryQuery) === TRUE) {
                $getNewEntries = "SELECT atlog.atlog_id, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, employee.emp_id, employee.first_name, employee.middle_name, employee.last_name
                                FROM atlog 
                                JOIN employee ON atlog.emp_id = employee.emp_id
                                WHERE atlog.emp_id = $empId AND atlog.atlog_DATE = CURDATE()";

                $resultNew = $conn->query($getNewEntries);   

                $row = $resultNew->fetch_assoc();
            } else {
                // Error creating new entry
            }
            // You can use $employeeFullName for further operations
        } else {
            // Handle the case when employee name retrieval fails
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Log in</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/employee-attendance-system.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
        <script src="../js/nav-bar.js" defer></script>
        <script src="../js/date-time.js" defer></script>
    </head>
    <body class="container-fluid">
    <div class="container-fluid row gap-0">
        <!-- Navigation Bar -->
        <div class="left_panel sticky-top container text-center pt-3">
            <img class="mt-3" src="../images/company-logo.png" alt="C597 Corporation Logo">
            <p class="company_name mt-2 mb-0">C597 Corporation</p>
            <p class="system_name">Employee Attendance System</p>

            <!-- Links / buttons -->
            <nav class="nav flex-column nav-pills mt-4 p-2 gap-2">
                <a class="nav_button nav-link" href="employee-attendance-system.php">Employee Log in</a>
                <span class="log_out_button mb-5"><a class="nav_button nav-link" href="employee-login.php">Log out</a></span>
            </nav>
        </div>
    
        <div class="right_panel container p-5">
            <?php
                if (isset($row['first_name'], $row['middle_name'], $row['last_name'])) {
                    $employeeFullName = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
                }
            ?>
            <p class="header_title">Welcome <span class="employee_name" id="employee_name"><?php echo $employeeFullName; ?></span>!</p>
            <div class="container-fluid mt-4 row gap-3">
                <div class="col col-8 p-0">
                    <div class="row m-0 gap-3">
                        <div class="date_container card px-4 py-2 col col-6">
                            <p class="date_subtitle m-0 p-0">Today is <span class="day_title" id="day_today"></span></p>
                            <!-- Date today -->
                            <span class="date_title"><p class="mb-0 p-0" id="full_date"></p></span>
                        </div>                       
                        <!-- Clock based on local time -->
                        <div class="clock_container grey_container col col-5 ms-auto p-0">
                            <div class="clock_elements">
                                <span id="hour"></span>
                                <span id="point">:</span>
                                <span id="minute"></span>
                                <span id="point">:</span>
                                <span id="second"></span>
                                <span id="am_pm"></span>
                            </div>
                        </div>
                    </div>
                    <div class="grey_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                        <div class="col col-5 card p-3">
                            <div class="am_title container w-50 mb-3 rounded-2 p-2"><p class="m-0">AM</p></div>
                            <form class="in_out_button row gap-2 m-0 p-0 justify-content-center" action="">
                            <?php
                                // Initialize the variable to track online/offline status
                                $employeeStatus = 'Unassigned';

                                // Display "Unassigned" button when it's not in the Morning or Day Shift
                                if ($employeeShift === 'Morning Shift' || $employeeShift === 'Day Shift') {
                                    // Display "AM" button if not checked in for PM and it's the Morning or Day Shift
                                    if ($row['am_in'] === null) {
                                        echo '<button class="btn in_button col col-auto" onclick="logAM()">IN</button>';
                                        // Update employee status to online when AM is logged in
                                    } else {
                                        // Display "Checked In" button if AM is checked in
                                        echo '<button class="btn in_button col col-auto" disabled>Checked In</button>';
                                        $employeeStatus = 'Online';
                                    }

                                    // Add the JavaScript function to log AM time using AJAX
                                    echo '<script>
                                            function logAM() {
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("GET", "log_am.php", true);
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        // Update the button status or show a success message if needed
                                                        console.log(xhr.responseText);
                                                    }
                                                };
                                                xhr.send();
                                            }
                                        </script>';

                                    // Display "OUT" button if not checked out for PM and it's the Morning or Day Shift
                                    if ($row['am_out'] === null) {
                                        echo '<button class="btn out_button col col-auto" onclick="logAMOut()">OUT</button>';
                                        // Update employee status to online when AM is logged out
                                    } else {
                                        // Display "Checked Out" button if AM is checked out
                                        echo '<button class="btn out_button col col-auto" disabled>Checked Out</button>';
                                        // If both AM in and AM out have values, update employee status to offline
                                        if ($row['am_in'] !== null && $row['am_out'] !== null) {
                                            $employeeStatus = 'Offline';
                                        }
                                    }

                                    // Add the JavaScript function to log AM out time using AJAX
                                    echo '<script>
                                            function logAMOut() {
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("GET", "out_am.php", true);
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        // Update the button status or show a success message if needed
                                                        console.log(xhr.responseText);
                                                    }
                                                };
                                                xhr.send();
                                            }
                                        </script>';
                                }
                                if ($employeeShift === 'Afternoon Shift') {
                                    echo '<button class="btn in_button col col-auto" disabled style="font-size: small;">Unassigned</button>';
                                } else {
                                    echo '';
                                }
                            ?>
                            </form>
                        </div>
                        <div class="col col-5 card p-3">
                            <div class="pm_title container w-50 mb-3 rounded-2 p-2"><p class="m-0">PM</p></div>
                            <form class="in_out_button row gap-2 m-0 p-0 justify-content-center" action="">
                            <?php
                                $employeeStatus = 'Unassigned';

                                // Display "Unassigned" button when it's not in the Morning or Day Shift
                                if ($employeeShift === 'Afternoon Shift' || $employeeShift === 'Day Shift') {
                                    // Display "AM" button if not checked in for PM and it's the Morning or Day Shift
                                    if ($row['pm_in'] === null) {
                                        echo '<button class="btn in_button col col-auto" onclick="logPM()">IN</button>';
                                        // Update employee status to online when AM is logged in
                                    } else {
                                        // Display "Checked In" button if AM is checked in
                                        echo '<button class="btn in_button col col-auto" disabled>Checked In</button>';
                                        $employeeStatus = 'Online';
                                    }
                                    // Add the JavaScript function to log AM time using AJAX
                                    echo '<script>
                                            function logPM() {
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("GET", "log_pm.php", true);
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        // Update the button status or show a success message if needed
                                                        console.log(xhr.responseText);
                                                    }
                                                };
                                                xhr.send();
                                            }
                                        </script>';

                                    // Display "OUT" button if not checked out for PM and it's the Morning or Day Shift
                                    if ($row['pm_out'] === null) {
                                        echo '<button class="btn out_button col col-auto" onclick="logPMOut()">OUT</button>';
                                        // Update employee status to online when AM is logged out
                                    } else {
                                        // Display "Checked Out" button if AM is checked out
                                        echo '<button class="btn out_button col col-auto" disabled>Checked Out</button>';
                                        // If both AM in and AM out have values, update employee status to offline
                                        if ($row['pm_in'] !== null && $row['pm_out'] !== null) {
                                            $employeeStatus = 'Offline';
                                        }
                                    }

                                    // Add the JavaScript function to log AM out time using AJAX
                                    echo '<script>
                                            function logPMOut() {
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("GET", "out_pm.php", true);
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                                        // Update the button status or show a success message if needed
                                                        console.log(xhr.responseText);
                                                    }
                                                };
                                                xhr.send();
                                            }
                                        </script>';
                                }

                                // Display the appropriate button based on the employee status
                                if ($employeeShift === 'Morning Shift') {
                                    echo '<button class="btn in_button col col-auto" disabled style="font-size: small;">Unassigned</button>';
                                } else {
                                    echo '';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col col-3-sm p-0">
                    <div class="grey_container p-3">
                        <div class="text-center emp_title mt-2 mb-3">Employee Information</div>
                        <!-- display employee information -->
                        <form action="" class="card m-3 p-3 employee_info d-flex gap-2 justify-content-between">
                            <div class="">
                                <label for="emp_id" class="form-label m-0">Emp ID</label>
                                <input class="form-control" type="text" value="<?php echo $empId; ?>" name="emp_id" disabled readonly>
                            </div>
                            <div class="">
                                <label for="emp_contract" class="form-label m-0">Contract</label>
                                <input class="form-control" type="text" value="<?php echo $employeeContract; ?>" name="emp_contract" disabled readonly>
                            </div>
                            <div class="">
                                <label for="emp_shift" class="form-label m-0">Shift</label>
                                <input class="form-control" type="text" value="<?php echo $employeeShift; ?>" name="emp_shift" disabled readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
    include_once __DIR__ . '/../php/update.php';
?>
