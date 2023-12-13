<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Maintenance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
                <form class="search_register white_container row m-0 p-3 align-items-center justify-content-between gap-2" method="GET">
                    <div class="register_button col col-4 m-0 p-0">
                        <a class="nav-link" href="employee-registration.php"><button class="btn btn-primary px-5 py-2" type="button">Register Employee</button></a>
                    </div>
                    <div class="col col-6-sm m-0 p-0">
                        <input class="form-control w-100" type="search" placeholder="Enter employee name or id" aria-label="Search" name="emp_id">
                    </div>
                    <div class="search_button col col-1 m-0 p-0"> 
                        <input class="btn btn-primary w-100" type="submit" value="Search">
                    </div>
                    <div class="col col-1 ms-auto p-0">
                        <a href="employee-maintenance.php"><button type="button" class="btn btn-primary w-100"><i class="bi bi-arrow-clockwise"></i></button></a>
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
                            <th scope="col">Zip Code</th>
                            <th scope="col">Contract</th>
                            <th scope="col">Shift</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        <?php
                            include "connection.php";
                            
                            if (isset($_GET["emp_id"])) {
                                $emp_id = $_GET["emp_id"];
                        
                                if (!$emp_id) {
                                    echo "
                                    <div class='alert alert-warning py-3 mb-3' role='alert'>
                                        <div class='alert_mes text-center'>No employee name or ID entered!</div>
                                    </div>
                                    ";
                                }
                        
                                // Modify the SQL query to search in both emp_id and full_name columns
                                $sql = "SELECT * FROM employee WHERE emp_id = '" . $emp_id . "' OR CONCAT(first_name, ' ', middle_name, ' ', last_name) LIKE '%" . $emp_id . "%'";
                                $result = mysqli_query($conn, $sql);
                        
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["emp_id"] . "</td>";
                                        echo "<td>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</td>";
                                        echo "<td>" . $row["contact_number"] . "</td>";
                                        echo "<td>" . $row["email_address"] . "</td>";
                                        echo "<td>" . $row["address"] . "</td>";
                                        echo "<td>" . $row["zip"] . "</td>";
                                        echo "<td>" . $row["contract"] . "</td>";
                                        echo "<td>" . $row["shift"] . "</td>";
                                        echo "<td>
                                                <div class='btn_container me-0 d-flex gap-1'>
                                                    <a href='employee-edit.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-secondary'><i class='bi bi-pencil-square'></i></button></a>
                                                    <a href='employee-delete.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-danger'><i class='bi bi-trash-fill'></i></button></a>
                                                </div>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    $emp_notfound = true;
                                }
                            } else {
                                $sql = "SELECT * FROM employee";
                                $result = mysqli_query($conn, $sql);
                        
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . $row["emp_id"] . "</td>";
                                        echo "<td>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</td>";
                                        echo "<td>" . $row["contact_number"] . "</td>";
                                        echo "<td>" . $row["email_address"] . "</td>";
                                        echo "<td>" . $row["address"] . "</td>";
                                        echo "<td>" . $row["zip"] . "</td>";
                                        echo "<td>" . $row["contract"] . "</td>";
                                        echo "<td>" . $row["shift"] . "</td>";
                                        echo "<td>
                                                <div class='btn_container me-0 d-flex gap-1'>
                                                    <a href='employee-edit.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-secondary'><i class='bi bi-pencil-square'></i></button></a>
                                                    <a href='employee-delete.php?emp_id=" . $row["emp_id"] . "' class='nav-link'><button class='btn btn-danger'><i class='bi bi-trash-fill'></i></button></a>
                                                </div>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    $emp_notfound = true;
                                }
                            } 
                            $conn->close();
                        ?>
                    </tbody>
                </table>
                <!-- Error message if there is no employee found -->
                <?php if (isset($emp_notfound)): ?>
                    <div class="alert alert-danger py-3 m-0" role="alert">
                        <div class="alert_mes text-center">No employee found!</div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</body>
</html>