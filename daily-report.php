<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/daily-report.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="js/nav_bar.js" defer></script>
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
            <p class="header_title"><span class="bold_title">Daily Log in</span> Report</p>
            <!-- First row -->
            <div class="row container-fluid mt-4 gap-3 d-flex justify-content-between">
                <div class="col col-7 p-0">
                    <!-- Display the date chosen by user -->
                    <div class="row m-0 p-0 gap-3">
                        <div class="date_container card px-4 py-2 col col-8">
                            <p class="date_subtitle">Viewing log in reports during</p>
                            <p class="date_title">DATE HERE</p>
                        </div>
                        <div class="card col col-2 p-0">
                            calendar
                        </div>
                    </div>
                </div>
                <!-- Display real-time clock -->
                <div class="card col col-4 p-0 m-0">
                    time nalang
                </div>
            </div>

            <!-- Reports -->
            <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                <table class="employee_table table">
                    <thead class="table_header">
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Contract</th>
                            <th scope="col">Shift</th>
                            <th scope="col">AM IN</th>
                            <th scope="col">AM OUT</th>
                            <th scope="col">PM IN</th>
                            <th scope="col">PM OUT</th>
                            <th scope="col">Late</th>
                            <th scope="col">Undertime</th>
                        </tr>
                    </thead>

                    <tbody class="">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark Otto</td>
                            <td>Full-time</td>
                            <td>Whole Day</td>
                            <td>8:00</td>
                            <td>12:01</td>
                            <td>1:00</td>
                            <td>5:01</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Mark Otto</td>
                            <td>Part-time</td>
                            <td>Afternoon</td>
                            <td>-</td>
                            <td>-</td>
                            <td>1:00</td>
                            <td>4:51</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Mark Otto</td>
                            <td>Part-time</td>
                            <td>Morning</td>
                            <td>-</td>
                            <td>-</td>
                            <td>9:00</td>
                            <td>12:51</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</body>
</html>