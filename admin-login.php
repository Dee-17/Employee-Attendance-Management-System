<?php
    //database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/admin-login.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <a href="landing-page.php"><button id="exit-button"><img id="exit-button-img" src="images/quit.png"></button></a>
            
        <!-- sign-in-form -->
            <form action="" method="post">
                <h1>Admin Log In</h1>
                <div class="infield">
                    <input type="text" placeholder="Username" id="sn-username" name="sn-username"/>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" id="sn-password" name="sn-password" />
                    <label></label>
                </div>
                <input type="hidden" name="form_id" value="1">
                <button type="submit">Sign In</button>
            </form>
        </div>
        <?php
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
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        echo "Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
                        }
                    } else {
                        // output a warning saying incorrect details
                        echo "<div>Incorrect Details</div>";
                    }
        
                    $stmt->close();
                    $conn->close();
                }
            } 
        ?>
        <!-- create-acc-form -->
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Create Account</h1>
                <div class="infield">
                    <input type="text" placeholder="Name" name="cr-name" id="cr-name"/>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="text" placeholder="Username" name="cr-username" id="cr-username"/>
                    <label></label>
                </div>
                <div class="infield">
                    <input type="password" placeholder="Password" name="cr-password" id="cr-password" />
                    <label></label>
                </div>
                <input type="hidden" name="form_id" value="2">
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <!-- welcome message -->
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info.</p>
                    <button>Sign Up</button>
                </div>
                <div class="overlay-panel overlay-left">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us!</p>
                    <button>Sign In</button>
                </div>
            </div>
            <?php
     if (isset($_POST['form_id'])) {
        $form_id = $_POST['form_id'];
        //if post data from form 2    
        if ($form_id == 2) {
            echo "this is form 2";

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
                echo "User Already Exists";
                }
            } 
            else {
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
            $stmt->close();
            $conn->close();
        }
    } 
    ?>

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