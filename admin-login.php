<?php
//server connection
$server_name = "localhost";
$user_name = "root";
$password = "";
$db_name = "employee_db";

$conn = new mysqli($server_name, $user_name, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//for sign-up
if (isset($_POST['sign_email']) && isset($_POST['sign_password'])) {
    $email = $_POST['sign_email'];
    $password = $_POST['sign_password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['login_user'] = $email;
        header("location: dashboard.php");
    } else {
        echo "Invalid email or password. Please try again.";
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
    <!-- link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/admin-login.css">
    <title>Admin Log-in</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="3" method="post">
                <h1>Create Account</h1>
                <div class="infield">
                    <input type="text" placeholder="Name" />
                    <label></label>
                </div>
                <div class="infield">
                    <input type="email" placeholder="Email" name="email"/>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" />
                    <label></label>
                </div>
                <button name="create_button">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="#" method="post">
                <h1>Sign in</h1>
                <div class="infield">
                    <input type="email" placeholder="Email" name="sign_email"/>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="sign_password" />
                    <label></label>
                </div>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button>Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button>Sign Up</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>

    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', () => {
            container.classList.toggle('right-panel-active');
            overlayCon.classList.toggle('overlay-active');
        });
        overlayBtn.classList.remove('btnScaled');
        window.requestAnimationFrame( () => {
            overlayBtn.classList.add('btnScaled');
        });
        
    </script>

</body>
</html>