<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include '/xampp/htdocs/Employee-Attendance-Management/php/database-check.php'; 
        include '/xampp/htdocs/Employee-Attendance-Management/php/head.php';
    ?>
    <title>Admin Login</title>
</head>
<body>
    <form action="">
        <br><br>
        <label for="user_name">user_name</label>
        <input type="text" name="user_name">
        <br><br>
        <label for="password">password</label>
        <input type="password" name="password">
        <br><br>
        <input type="submit">
    </form>
</body>
</html>