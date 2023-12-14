<?php 
    include "connection.php";

    $date_picked = ($_POST['table_date']);
    $date_picked = mysqli_real_escape_string($conn, $date_picked);
    $sql = "SELECT atlog.emp_id, employee.first_name, employee.middle_name, employee.last_name, employee.shift, employee.contract, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.overtime, atlog.night_differential
    FROM atlog
    JOIN employee ON atlog.emp_id = employee.emp_id
    WHERE atlog.atlog_DATE = '$date_picked';";

    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row["emp_id"] . "</td>";
            echo "<td>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</td>";
            echo "<td>" . $row["contract"] . "</td>";
            echo "<td>" . $row["shift"] . "</td>";
            if($row["am_late"] == "YES"){
                echo "<td style='color:red'>" . $row["am_in"] . "</td>";
                echo "<script>console.log('" . $row["am_in"] . "')</script>";
            } else{
                echo "<td>" . $row["am_in"] . "</td>";
            }

            if($row["am_underTIME"]== "YES"){
                echo "<td style='color:blue'>" . $row["am_out"] . "</td>";
            } else{
                echo "<td>" . $row["am_out"] . "</td>";
            }

            if($row["pm_late"] == "YES"){
                echo "<td style='color:red'>" . $row["pm_in"] . "</td>";
            } else{
                echo "<td>" . $row["pm_in"] . "</td>";
            }
            
            if($row["pm_out"]== "YES"){
                echo "<td style='color:blue'>" . $row["pm_out"] . "</td>";
            } else {
                echo "<td>" . $row["pm_out"] . "</td>";
            }
            echo "<td>" . $row["overtime"] . "</td>";
            echo "<td>" . $row["night_differential"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        
    } else {
        echo "
        <div class='alert alert-danger m-0 p-3' role='alert'>
        No Records Found
        </div>";
    }
?>