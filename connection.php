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
    
    
    $conn->query("UPDATE atlog SET am_late = IF(TIMEDIFF(am_in, '8:30:00') > '00:30:00', 'YES', 'NO');");
    $conn->query("UPDATE atlog SET am_under = IF(TIMEDIFF(am_out,'11:30:00') > '00:30:00', 'YES', 'NO');");
    $conn->query("UPDATE atlog SET am_late = IF(TIMEDIFF(pm_in, '16:30:00') > '00:30:00', 'YES', 'NO');");
    $conn->query("UPDATE atlog SET am_under = IF(TIMEDIFF(pm_out,'17:30:00') > '00:30:00', 'YES', 'NO');");
    $conn->query("UPDATE atlog SET night_differential = IF(pm_out < '22:00:00', 0, TIME_TO_SEC(TIMEDIFF(pm_out, '6:00:00')) * 0.10 / 3600);");
    ?>