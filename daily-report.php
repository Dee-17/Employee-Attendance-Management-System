<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">    
    <link rel="stylesheet" href="css/daily-report.css">
    <link rel="stylesheet" href="css/nav_bar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/nav-bar.js" defer></script>
    <script src="js/date-time.js" defer></script>
    <script src="js/full-calendar.js" defer></script>

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

        <!-- Calendar modal -->
        <div class="modal fade" id="calendar_modal" tabindex="-1" aria-labelledby="calendar_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="calendar_label">Date picker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select a date</p>
               <input class="form-control" type="date" name="date_picker" id="picked_date">
            </div>
            <div class="modal-footer">
                <button type="button" class="close_button btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <div class="search_button"><button type="button" class="btn btn-primary" id="search_button">Search</button></div>
            </div>
            </div>
        </div>
        </div>

        <!-- Main contents -->
        <div class="right_panel container p-5">
            <p class="header_title"><span class="bold_title">Daily Log in</span> Report</p>
            <!-- First row -->
            <div class="row container-fluid mt-4 gap-3 d-flex justify-content-between">
                <div class="col col-7 p-0">
                    <!-- Display the date chosen by user -->
                    <div class="row m-0 p-0 gap-3">
                        <!-- hidden by default -->
                        <div class="date_container card px-4 py-2 col col-6" style="display: none;" id="date_picked">
                            <p class="date_subtitle">Viewing log in reports during</p>
                            <p class="date_title" id="selected_date"></p>
                        </div>
                        <div class="date_container card px-4 py-2 col col-6" id="current_date">
                            <p class="date_subtitle">Viewing log in reports today</p>
                            <span class="day_title" id="day_today" hidden></span>
                            <p class="date_title" id="full_date"></p>
                        </div>
                        <div class="card col col-2 p-0 align-items-center justify-content-center">
                           <div class="calendar_icon"><a type="button" data-bs-toggle="modal" data-bs-target="#calendar_modal"><i class="bi bi-calendar4-week" style="font-size: 2rem;"></i></a></div>
                        </div>
                    </div>
                </div>
                <!-- Display real-time clock -->
                <div class="clock_container grey_container col col-4 m-0 p-0">
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
            <!-- Reports -->
            <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly" id="table_container">
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

                    <tbody>
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
                            <td>9:00</td>
                            <td>12:51</td>
                            <td>-</td>
                            <td>-</td>
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