<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Maintenance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/employee-maintenance.css">
    <script src="js/nav-bar.js" defer></script>

</head>
<body class="container-fluid">
    <div class="container-fluid row gap-0">
        <?php 
            include('nav-bar.php');
        ?>
        <!-- Main contents -->
        <div class="right_panel container p-5">
            <p class="header_title">Employee <span class="blue_title">Maintenance</span></p>
                <form class="search_register row white_container m-0 p-3 d-flex gap-3 align-items-center" action="">
                    <div class="register_button col col-4 m-0 p-0">
                        <a class="nav-link" href="employee-registration.php"><button class="btn btn-primary px-5 py-2" type="button">Register Employee</button></a>
                    </div>
                    <div class="col col-6 p-0 ms-auto">
                        <input class="form-control" type="search" placeholder="Enter employee name or id" aria-label="Search">
                    </div>
                    <div class="search_button m-0 p-0 col col-auto"> 
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            <!-- Employee list -->
            <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contract</th>
                            <th scope="col">Shift</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        <tr>
                        <th scope="row">01</th>
                            <td>Mark Otto</td>
                            <td>0912345678</td>
                            <td>markotto@gmail.com</td>
                            <td>Zone 10 Legazpi City</td>
                            <td>Full Time</td>
                            <td>Day Shift</td>
                            <td>
                                <div class="btn_container me-0">
                                    <button type="button" class="btn btn-secondary"><a href="employee-edit.php" class="nav-link">Edit</a></button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <th scope="row">02</th>
                            <td>Mark Otto</td>
                            <td>0912345678</td>
                            <td>markotto@gmail.com</td>
                            <td>Zone 10 Legazpi City</td>
                            <td>Full Time</td>
                            <td>Day Shift</td>
                            <td>
                                <div class="btn_container me-0">
                                    <button type="button" class="btn btn-secondary"><a href="employee-edit.php" class="nav-link">Edit</a></button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <th scope="row">03</th>
                            <td>Mark Otto</td>
                            <td>0912345678</td>
                            <td>markotto@gmail.com</td>
                            <td>Zone 10 Legazpi City, Albay</td>
                            <td>Full Time</td>
                            <td>Day Shift</td>
                            <td>
                                <div class="btn_container me-0">
                                    <button type="button" class="btn btn-secondary"><a href="employee-edit.php" class="nav-link">Edit</a></button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
