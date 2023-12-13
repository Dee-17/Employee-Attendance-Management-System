<?php 
    include "connection.php";

    $date_picked = ($_POST['table_date']);
    $date_picked = mysqli_real_escape_string($conn, $date_picked);
    $sql = "SELECT atlog.emp_id, employee.full_name, employee.contract, employee.shift, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
    FROM atlog
    JOIN employee ON atlog.emp_id = employee.emp_id
    WHERE atlog.atlog_DATE = '$date_picked';";

    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row["emp_id"] . "</td>";
            echo "<td>" . $row["full_name"]  . "</td>";
            echo "<td>" . $row["contract"] . "</td>";
            echo "<td>" . $row["shift"] . "</td>";
            echo "<td>" . $row["am_in"] . "</td>";
            echo "<td>" . $row["am_out"] . "</td>";
            echo "<td>" . $row["pm_in"] . "</td>";
            echo "<td>" . $row["pm_out"] . "</td>";
            echo "<td>" . $row["night_differential"] . "</td>";
            echo "<td>" . $row["night_differential"] . "</td>";
            echo "</tr>";
        }
    }
    else{
        echo "<td>";
        echo "No Records Found";
        echo "</td>"; 
    }
?>