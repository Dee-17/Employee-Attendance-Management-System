<?php
    include_once __DIR__ . '/../php/connection.php';

    
    if (isset($_POST['form_id'])) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT full_name,username, password FROM admin WHERE full_name = ? AND username = ? AND password = ?");
        $stmt->bind_param("sss",$full_name, $username, $password);

        // set parameters and execute
        $username = $_POST['cr-username'];
        $password = $_POST['cr-password'];
        $full_name = $_POST['cr-name'];
        $stmt->execute();

        // get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            $cr_exist = true;
            }
        } 
        else {
            if(empty($username) || empty($password) || empty($full_name)) {
                $cr_error = true;
            } else {
                // if user not found, insert user into user table
                $stmt = $conn->prepare("INSERT INTO admin (username, password,full_name) VALUES (?,?,?)");
                $stmt->bind_param("sss", $username, $password,$full_name);

                // set parameters and execute
                $username = $_POST['cr-username'];
                $password = $_POST['cr-password'];
                $full_name = $_POST['cr-name'];
                $stmt->execute();
                
                $cr_success = true;
            }
        }
        $stmt->close();
        $conn->close();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/admin-emp-login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="login_container card rounded-4 shadow-lg m-0 p-0 overflow-hidden">
            <!-- Back button -->
            <div class="top_panel p-3 d-flex justify-content-center">
                <div class="row container-fluid justify-content-end">
                    <a href="http://localhost/employee-attendance-management/index.php"><i class="bi bi-arrow-left" style="color: white;"></i></a>
                </div>
            </div>
            <!-- Create account for admin -->
            <div class="row bottom_panel mx-5 my-4 p-0">
                <form class="m-0 p-0" action="" method="post">
                    <!-- Display a message depending on the error -->
                    <?php if (isset($cr_error)): ?>
                        <!-- If there are missing fields -->
                        <div class="alert alert-warning py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Please fill out all fields!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($cr_exist)): ?>
                        <!-- If there is an existing admin account -->
                        <div class="alert alert-danger py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Admin already exists!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Display a message upon successful creation of account -->
                    <?php if (isset($cr_success)): ?>
                        <div class="alert alert-success py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Account created successfully!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- ADMIN SIGN UP FORM -->
                    <p class="text-center">Admin Sign up</p>
                    <div class="mt-3">
                        <label for="cr-name">Name</label>
                        <input class="form-control" type="text" placeholder="Enter full name" id="cr-name" name="cr-name"/>
                    </div>
                    <div class="mt-2">
                        <label for="cr-username">Username</label>
                        <input class="form-control" type="text" placeholder="Enter username" id="cr-username" name="cr-username"/>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="cr-password">Password</label>
                        <input class="form-control" type="password" placeholder="Enter password" id="cr-password" name="cr-password" />
                    </div>
                    <input type="hidden" name="form_id">
                    <div class="login_button d-flex justify-content-center align-items-center">
                        <button class="my-3 w-50 text-center btn btn-primary" type="submit">Sign up</button>
                    </div>
                    <!-- Option to log in to an existing account -->
                    <div class="mt-3 create_account text-center">
                        <p>Already have an account? <span class="bold_title"><a class="nav_link" href="admin-login.php">Log in</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 