<?php
    include "update.php";
    $sql = "SELECT * FROM atlog INNER JOIN employee ON atlog.emp_id = employee.emp_id WHERE atlog.atlog_DATE = CURDATE()";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/login-report.css">
    <script src="js/nav-bar.js" defer></script>
    <script src="js/date-time.js" defer></script>
</head>
<body class="container-fluid">
    <div class="container-fluid row gap-0">
        <!-- Navigation Bar -->
        <div class="left_panel sticky-top container text-center pt-3">
            <img class="mt-3" src="images/company-logo.png" alt="C597 Corporation Logo">
            <p class="company_name mt-2 mb-0">C597 Corporation</p>
            <p class="system_name">Employee Attendance System</p>

            <!-- Links / buttons -->
            <nav class="nav flex-column nav-pills mt-4 p-2 gap-2">
                <a class="nav_button nav-link" href="login-report.php">Log in Report</a>
                <a class="nav_button nav-link" href="employee-maintenance.php">Employee Maintenance</a>
                <a class="nav_button nav-link" href="daily-report.php">Daily Report</a>
                <a class="nav_button nav-link" href="monthly-report.php">Monthly Report</a>
                <span class="log_out_button mb-3"><a class="nav_button nav-link" href="employee-login.php">Log out</a></span>
            </nav>
        </div>
        <!-- Main contents -->
        <div class="right_panel container p-5">
            <!-- Name must be according to id inputted by admin -->
            <p class="title_2">Welcome <span class="admin_name" id="admin_name">ADMIN123</span>!</p>
            <div class="container mt-4 row gap-3">
                <div class="col col-12 p-0">
                    <div class="row m-0 gap-3">
                        <div class="date_container card px-4 py-2 col col-4">
                            <p class="date_subtitle m-0 p-0">Today is <span class="day_title" id="day_today"></span></p>
                            <!-- Date today -->
                            <span class="date_title"><p class="mb-0 p-0" id="full_date"></p></span>
                        </div>                       
                        <div class="am_pm_container grey_container col col-8-sm p-0 mx-0 text-center justify-content-evenly">
                            <div class="col col-12 card p-3">
                                <form class="am_pm_button row gap-2 m-0 p-0 justify-content-center" action="" method="post">
                                    <button type="submit" class="btn am_button col col-auto" name="am" value="am" onclick="" <?php if(isset($_POST['am'])) echo 'disabled'; ?>>AM</button>
                                    <button type="submit" class="btn pm_button col col-auto" name="pm" value="pm" onclick="" <?php if(isset($_POST['pm'])) echo 'disabled'; ?>>PM</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Emp ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">IN</th>
                                <th scope="col">OUT</th>
                                <th scope="col">Late</th>
                                <th scope="col">Undertime</th>
                                
                              </tr>
                            </thead>
                            <tbody class="">
                            <?php
                                function checkButton() {
                                    global $conn, $sql;
                                    if (isset($_POST['am'])) {
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr><td>". $row["emp_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["am_in"] . "</td><td>". $row["am_out"] ."</td><td>". $row["am_late"] ."</td><td>". $row["am_under"] ."</td></tr>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                    } else if (isset($_POST['pm'])) {
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr><td>". $row["emp_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["pm_in"] . "</td><td>". $row["pm_out"] ."</td><td>". $row["pm_late"] ."</td><td>". $row["pm_under"] ."</td></tr>";
                                            }
                                        } else {
                                            echo "0 results";
                                        }
                                    } else {
                                        echo "No button is selected yet";
                                    }
                                }
                                checkButton();
                                $conn->close();
                            ?>
                            </tbody>
                          </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>