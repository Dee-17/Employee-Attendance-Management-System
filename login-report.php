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
        <?php 
            include('nav-bar.php');
        ?>
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
                                <form class="am_pm_button row gap-2 m-0 p-0 justify-content-center" action="">
                                    <button class="btn am_button col col-auto" onclick="">AM</button>
                                    <button class="btn pm_button col col-auto" onclick="">PM</button>
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
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark Otto</td>
                                <td>8:00</td>
                                <td>12:01</td>
                                <td>0</td>
                                <td>0</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Mark Otto</td>
                                <td>8:00</td>
                                <td>12:01</td>
                                <td>0</td>
                                <td>0</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Mark Otto</td>
                                <td>8:00</td>
                                <td>12:01</td>
                                <td>0</td>
                                <td>0</td>
                              </tr>
                            </tbody>
                          </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>