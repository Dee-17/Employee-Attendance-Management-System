<?php 
    include "connection.php";

    $date_picked = ($_POST['table_date']);
    $date_picked = mysqli_real_escape_string($conn, $date_picked);
    $sql = "SELECT atlog.emp_id, employee.first_name, employee.last_name, employee.middle_name, employee.shift,employee.contract, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
    FROM atlog
    JOIN employee ON atlog.emp_id = employee.emp_id
    WHERE atlog.atlog_DATE = '$date_picked';";

    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>";
            echo $row['emp_id'];
            echo "</td>";
            echo "<td>";
            echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
            echo "</td>";
            echo "<td>";
            echo $row['contract'];
            echo "</td>";
            echo "<td>";
            echo $row['shift'];
            echo "</td>";
            echo "<td>";
            echo $row['am_in'];
            echo "</td>";
            echo "<td>";
            echo $row['am_out'];
            echo "</td>";
            echo "<td>";
            echo $row['pm_in'];
            echo "</td>";
            echo "<td>";
            echo $row['pm_out'];
            echo "</td>";
            echo "</tr>";
        }
    }
    else{
        echo "<td>";
        echo "No Records Found";
        echo "</td>"; 
    }
?>