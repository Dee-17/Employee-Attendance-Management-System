<?php
    include_once __DIR__ . '/../php/connection.php';

    session_start();
    
    if (isset($_POST['form_id'])) {
        // prepare and bind
        $stmt = $conn->prepare("SELECT admin_id, username, password FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);

        // set parameters and execute
        $username = $_POST['sn-username'];
        $password = $_POST['sn-password'];
        $stmt->execute();

        // get the result
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch the admin ID and store it in the session
            $row = $result->fetch_assoc();
            $_SESSION['admin_id'] = $row['admin_id'];

            // redirect
            header("Location: login-report.php");
        } else {
            if (empty($username) || empty($password)) {
                $sn_missing = true; 
            } else {
                // output a warning saying incorrect details
                $sn_error = true;
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
                    <a href="../../index.php"><i class="bi bi-arrow-left" style="color: white;"></i></a>
                </div>
            </div>
            <!-- Admin log in -->
            <div class="row bottom_panel mx-5 my-4 p-0">
                <form class="m-0 p-0" action="" method="post">
                    <!-- Displays an error -->
                    <?php if (isset($sn_error)): ?>
                        <!-- If the credentials are incorrect -->
                        <div class="alert alert-danger py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Incorrect username or password!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($sn_missing)): ?>
                        <!-- If there are missing fields -->
                        <div class="alert alert-warning py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Please fill out all fields!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>
                    
                    <!-- ADMIN LOGIN FORM -->
                    <p class="text-center">Admin Log In</p>
                    <div class="mt-3">
                        <label for="sn-username">Username</label>
                        <input class="form-control" type="text" placeholder="Enter admin username" id="sn-username" name="sn-username"/>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="sn-password">Password</label>
                        <input class="form-control" type="password" placeholder="Enter password" id="sn-password" name="sn-password" />
                    </div>
                    <input type="hidden" name="form_id" value="1">
                    <div class="login_button d-flex justify-content-center align-items-center">
                        <button class="my-3 w-50 text-center btn btn-primary" type="submit">Log In</button>
                    </div>
                    <!-- Option to create an account -->
                    <div class="mt-3 create_account text-center">
                        <p>Need an account? <span class="bold_title"><a class="nav_link" href="admin-sign-up.php">Create an account</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 
