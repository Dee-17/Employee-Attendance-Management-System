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
            <!-- Name must be according to id inputted by admin -->
            <p class="title_2">Welcome <span class="admin_name" id="admin_name">ADMIN123</span>!</p>
            <div class="container mt-4 row gap-3">
                <div class="col col-12 p-0">
                    <div class="row m-0 gap-3">  
                        <div class="grey_container col col-12-sm p-0 mx-0 text-center justify-content-evenly">
                            <div class="col col-12 card p-3">
                                <form class="d-flex" method="get">
                                    <button type="button" class="register_button btn me-3 btn-outline-primary"><a class="nav-link" href="employee-registration.php">Register Employee</a></button>
                                    <input class="form-control me-3" type="text" placeholder="Enter employee name or id" name="emp_id">
                                    <input class="search_button btn btn-outline-success" type="submit" value="Search">
                                    <a href="employee-maintenance.php"><button type="button" class="btn"><img id="exit-button-img" src="images/refresh.png"></button></a>
                                </form>


                              </div>
                        </div>

                        <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Emp ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">ZIP</th>
                                    <th scope="col">Contract</th>
                                    <th scope="col">Shift</th>
                                    <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                <?php
                                    include "connection.php";
                                    
                                    if (isset($_GET["emp_id"])) {
                                        $emp_id = $_GET["emp_id"];
                                
                                        if (!$emp_id) {
                                            echo "<script> ('Employeee ID Not Specificied!');  window.location.href = 'employee-maintenance.php'</script>";
                                            return;
                                        }
                                
                                        // Modify the SQL query to search in both emp_id and full_name columns
                                        $sql = "SELECT * FROM employee WHERE emp_id = '" . $emp_id . "' OR full_name LIKE '%" . $emp_id . "%'";
                                        $result = mysqli_query($conn, $sql);
                                
                                        if (!$result) {
                                            echo "<p class='error'>Error: " . mysqli_error() . "</p>";
                                            return;
                                        }
                                
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["emp_id"] . "</td>";
                                                echo "<td>" . $row["full_name"] . "</td>";
                                                echo "<td>" . $row["contact_number"] . "</td>";
                                                echo "<td>" . $row["email_address"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["zip"] . "</td>";
                                                echo "<td>" . $row["contract"] . "</td>";
                                                echo "<td>" . $row["shift"] . "</td>";
                                                echo "<td>
                                                        <div class='btn_container me-0'>
                                                            <button class='btn btn-outline-dark'><a href='employee-edit.php?emp_id=" . $row["emp_id"] . "' class='nav-link'>Edit</a></button>
                                                            <button class='btn btn-outline-danger'><a href='employee-delete.php?emp_id=" . $row["emp_id"] . "' class='nav-link'>Delete</a></button>
                                                        </div>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'>Employee not found!</td></tr>";
                                        }
                                    } else {
                                        $sql = "SELECT * FROM employee";
                                        $result = mysqli_query($conn, $sql);
                                
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["emp_id"] . "</td>";
                                                echo "<td>" . $row["full_name"] . "</td>";
                                                echo "<td>" . $row["contact_number"] . "</td>";
                                                echo "<td>" . $row["email_address"] . "</td>";
                                                echo "<td>" . $row["address"] . "</td>";
                                                echo "<td>" . $row["zip"] . "</td>";
                                                echo "<td>" . $row["contract"] . "</td>";
                                                echo "<td>" . $row["shift"] . "</td>";
                                                echo "<td>
                                                        <div class='btn_container me-0'>
                                                            <button class='btn btn-secondary'><a href='employee-edit.php?emp_id=" . $row["emp_id"] . "' class='nav-link'>Edit</a></button>
                                                            <button class='btn btn-danger'><a href='employee-delete.php?emp_id=" . $row["emp_id"] . "' class='nav-link'>Delete</a></button>
                                                        </div>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "No employees found.";
                                        }
                                    } 
                                    $conn->close();
                                ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


