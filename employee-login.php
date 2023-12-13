<?php
    include "connection.php";

    if (isset($_POST['signin'])) {
        $id = $_POST['id-number'];
        $password = $_POST['password'];

        if (empty($id) || empty($password)) {
            echo "Warning: Please fill all the fields";
        } else {
            $query = "SELECT * FROM employee WHERE emp_id = '$id'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if ($password == $row['password']) {
                    header("Location: employee-attendance-system.php");
                } else {
                    $em_sn_error = true;
                }
            } else {
                $em_sn_error = true;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/employee-login.css">
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
                    <?php if (isset($em_sn_error)): ?>
                        <div class="alert alert-danger py-3 mb-3 d-flex justify-content-between" role="alert">
                            <div class="alert_mes">Incorrect username or password!</div>
                            <button class='btn-close' data-bs-dismiss='alert' aria-label='Close' type='button'></button>
                        </div>
                    <?php endif; ?>
                    
                    <p class="text-center">Employee Log In</p>
                    <div class="mt-3">
                        <label for="id-number">Username</label>
                        <input class="form-control" type="text" placeholder="Enter employee ID" id="id-number" name="id-number"/>
                    </div>
                    <div class="mt-2 mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" placeholder="Enter password" id="password" name="password"/>
                    </div>
                    <input type="hidden" name="form_id" value="1">
                    <div class="login_button d-flex justify-content-center align-items-center">
                        <button class="my-3 w-50 text-center btn btn-primary" type="submit" name="signin">Log In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>