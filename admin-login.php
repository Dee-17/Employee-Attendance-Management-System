<?php
    include "connection.php";
    
    if (isset($_POST['form_id'])) {
        $form_id = $_POST['form_id'];
        //if post data is from form 1
        if ($form_id == 1) {
            
            // prepare and bind
            $stmt = $conn->prepare("SELECT username, password FROM admin WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);

            // set parameters and execute
            $username = $_POST['sn-username'];
            $password = $_POST['sn-password'];
            $stmt->execute();

            // get the result
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // redirect
                header("Location:login-report.php");
                
            } else {
                // output a warning saying incorrect details
                $sn_error = true;
            }

            $stmt->close();
            $conn->close();
        }
        //if post data from form 2    
        elseif ($form_id == 2) {
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
                echo "User Already Exists";
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

                    echo "New User Created";
                }
            }
            $stmt->close();
            $conn->close();
        }
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
    <link rel="stylesheet" href="css/admin-login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="login_container card rounded-4 shadow-lg m-0 p-0 overflow-hidden">
            <!-- Back button -->
            <div class="top_panel p-3 d-flex justify-content-center">
                <div class="row container-fluid justify-content-end">
                    <a href="landing-page.php"><i class="bi bi-arrow-left" style="color: white;"></i></a>
                </div>
            </div>
            <!-- Admin log in -->
            <div class="row bottom_panel mx-5 my-4 p-0">
                <form class="m-0 p-0" action="" method="post">
                    <!-- Displays an error if the credentials are incorrect -->
                    <?php if (isset($sn_error)): ?>
                        <div class="alert alert-danger py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Incorrect username or password!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>
                    
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
                    <div class="m-3 create_account">
                        <p>Need an account? <span class="bold_title"><a class="nav_link" href="admin-sign-up.php">Create an account</a></span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 