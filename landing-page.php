<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="css/landing-page.css">
  
</head>
<body>
    <div class="container" id="container">
        <div class="content-left">
            <div class="company-title">
                <div class="div">
                    <img class="logo mt-3" src="images/company-logo.png" alt="C597 Corporation Logo">
                </div>

                <div class="title">
                    <h1>Employee Attendance System</h1>
                    <p>C597 Corporation | All Rights Reserved </p>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="select-container">
                <center>
                    <div class="subtitle">
                        <h2>Welcome!</h2>
                        <h3>Please select an option below.</h3>
                    </div>
                    <div class="button-container">
                        <a href="admin-login.php"><button class="button" id="admin-button">I am an <span>Admin</span></button></a>
                        <a href="employee-login.php"><button class="button" id="employee-button">I am an <span>Employee</span></button></a>
                    </div>
                </center>
            </div>
        </div>
    </div>

</body>
</html>