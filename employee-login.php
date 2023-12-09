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
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/employee-login.css">
 
</head>
<body>
    <div class="container" id="container">
        <div class="content-left">
            <div class="title">
                <center>
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                </center>
            </div>
        </div>

        <div class="content-right">
            <div class="form-container sign-in-container">
                <a href="landing-page.php"><button id="exit-button"><img id="exit-button-img" src="images/quit.png"></button></a>
                <form action="" method="post">
                    <h1>Employee Log In</h1>
                    <div class="infield">
                        <input type="text" placeholder="ID Number" name="id-number"/>
                        <label></label>
                    </div>
                    <div class="infield">
                        <input type="password" placeholder="Password" name="password"/>
                        <label></label>
                    </div>
                    <button type="submit" name="signin">Sign In</button>

                    <?php if (isset($em_sn_error)): ?>
                    <p class="error">Incorrect username or password!</p>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</body>
</html>