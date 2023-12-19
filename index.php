<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C597 Corporation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="pages/css/landing-page.css">
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="w-50 card rounded-4 container shadow-lg m-0 p-0 overflow-hidden">
            <div class="row container-fluid m-0 p-0">
                <!-- Corporation Intro -->
                <div class="left_panel m-0 p-5 col col-6">
                    <div class="py-5 m-0">
                        <img class="mb-4" src="pages/images/company-logo.png" alt="C597 Corporation Logo">
                        <h3 class="header_title">Employee<br>Attendance<br>System</h3>
                        <p class="footer_title mt-5">C597 Corporation | All Rights Reserved</p>
                    </div>
                </div>
                <!-- Position selection -->
                <div class="right_panel m-0 py-5 col col-6 d-flex justify-content-center align-items-center">
                    <div class="my-5 mx-3 p-4 text-center justify-content-center container-fluid">
                        <p class="custom_font1 bold_title m-0 p-0">Welcome!</p>
                        <p class="custom_font2 mt-3 p-0">Please select an option below</p>
                        <!-- Buttons -->
                        <div class="button_group container mt-3">
                            <a class="admin_button" href="pages/admin/admin-login.php"><button class="btn btn-primary w-100 p-2">I am an <span class="bold_title">Admin</span></button></a>
                            <a class="emp_button" href="pages/employee/employee-login.php"><button class="btn btn-light w-100 mt-2 p-2">I am an <span class="bold_title">Employee</span></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>