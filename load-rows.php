<?php 
    include "connection.php";

    $date_picked = date('Y-m-d', strtotime($_POST['table_date']));
    echo "<script>console.log($date_picked)</script>";
    $sql = "SELECT atlog.emp_id, employee.full_name, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
    FROM atlog
    JOIN employee ON atlog.emp_id = employee.emp_id
    WHERE atlog.atlog_DATE = $date_picked;";

    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>";
            echo $row['emp_id'];
            echo "</td>";
            echo "</tr>";
        }
    }
    else{
        echo "No Records Found";
    }
?>