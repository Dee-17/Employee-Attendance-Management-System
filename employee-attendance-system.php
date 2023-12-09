<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/employee-attendance-system.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="js/nav_bar.js" defer></script>
    <script src="js/employee-attendance-system.js" defer></script>
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
                <a class="nav_button nav-link" href="employee-attendance-system.php">Employee Log in</a>
                <span class="log_out_button mb-5"><a class="nav_button nav-link" href="employee-login.php">Log out</a></span>
            </nav>
        </div>
        <!-- Main contents -->
        <div class="right_panel container p-5">
            <!-- Name must be according to id inputted by employee -->
            <p class="header_title">Welcome <span class="employee_name" id="employee_name">JUAN DELA CRUZ</span>!</p>
            <div class="container mt-4 row gap-3">
                <div class="col col-8 p-0">
                    <div class="row m-0 gap-3">
                        <div class="date_container card px-4 py-2 col col-5">
                            <p class="date_subtitle m-0 p-0">Today is <span class="day_title" id="day_today"></span></p>
                            <!-- Date today -->
                            <span class="date_title"><p class="mb-0 p-0" id="full_date"></p></span>
                        </div>                       
                        <!-- Clock based on local time -->
                        <div class="clock_container grey_container col col-7-sm m-0 p-0">
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

                    <!-- AM and PM log in and log out buttons -->
                    <div class="grey_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                        <div class="col col-5 card p-3">
                            <div class="am_title container w-50 mb-3 rounded-2 p-2"><p class="m-0">AM</p></div>
                            <form class="in_out_button row gap-2 m-0 p-0 justify-content-center" action="">
                                <button class="btn in_button col col-auto" onclick="">IN</button>
                                <button class="btn out_button col col-auto" onclick="">OUT</button>
                            </form>
                        </div>
                        <div class="col col-5 card p-3">
                            <div class="pm_title container w-50 mb-3 rounded-2 p-2"><p class="m-0">PM</p></div>
                            <form class="in_out_button row gap-2 m-0 p-0 justify-content-center" action="">
                                <button class="btn in_button col col-auto" onclick="">IN</button>
                                <button class="btn out_button col col-auto" onclick="">OUT</button>
                            </form>
                        </div>
                        <!-- Alert Message -->
                        <!-- <div class="alert_container card mt-3">
                           
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>