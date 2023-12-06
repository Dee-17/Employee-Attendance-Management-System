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
            <div class="container mt-4 row gap-3">
                <div class="col col-8 p-0">

                </div>
            </div>
        </div>
    </div>
</body>
</html>