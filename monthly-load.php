<?php 
    include "connection.php";

    
    //function para i-display lahat ng rows on current month 
    if(isset($_POST['table_onload'])){
        $date_picked = ($_POST['table_onload']);
        
        $sql = "SELECT atlog.emp_id, atlog.atlog_DATE, employee.first_name, employee.last_name, employee.middle_name, employee.shift,employee.contract, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
        FROM atlog
        JOIN employee ON atlog.emp_id = employee.emp_id
        WHERE MONTH(atlog.atlog_DATE) = MONTH(STR_TO_DATE($date_picked, '%m/%d/%Y'))";
        
        $result = mysqli_query($conn, $sql);
        

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th scope='col'>Emp ID</th>";
                        echo "<th scope='col'>Date</th>";
                        echo "<th scope='col'>AM IN</th>";
                        echo "<th scope='col'>AM OUT</th>";
                        echo "<th scope='col'>PM IN</th>";
                        echo "<th scope='col'>PM OUT</th>";
                        echo "<th scope='col'>Overtime</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody class='table_body' id='table_body'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["emp_id"] . "</td>";
                    echo "<td>" . $row["atlog_DATE"] . "</td>";

                    if($row["am_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["am_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["am_in"] . "</td>";
                    }

                    if($row["am_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["am_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["am_out"] . "</td>";
                    }

                    if($row["pm_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["pm_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["pm_in"] . "</td>";
                    }
                    
                    if($row["pm_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["pm_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["pm_out"] . "</td>";
                    }
                    echo "</tr>";
            }
                echo "</tbody>";
                echo "</table>";
        } else {
            // Handle case when no records are found
            echo "No Records Found";
        }
        
    }
    if(isset($_POST['select_date'])){
        $selected_date = ($_POST['select_date']);
        list($year, $month) = explode('-', $selected_date);
        $year = substr($year, 1);

        $sql = "SELECT atlog.emp_id, atlog.atlog_DATE, employee.first_name, employee.last_name, employee.middle_name, employee.shift,employee.contract, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
        FROM atlog
        JOIN employee ON atlog.emp_id = employee.emp_id
        WHERE MONTH(atlog.atlog_DATE) = '$month' AND YEAR(atlog.atlog_DATE) = '$year'";
        
        $result = mysqli_query($conn, $sql);
        

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th scope='col'>Emp ID</th>";
                        echo "<th scope='col'>Date</th>";
                        echo "<th scope='col'>AM IN</th>";
                        echo "<th scope='col'>AM OUT</th>";
                        echo "<th scope='col'>PM IN</th>";
                        echo "<th scope='col'>PM OUT</th>";
                        echo "<th scope='col'>Overtime</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody class='table_body' id='table_body'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["emp_id"] . "</td>";
                    echo "<td>" . $row["atlog_DATE"] . "</td>";

                    if($row["am_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["am_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["am_in"] . "</td>";
                    }

                    if($row["am_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["am_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["am_out"] . "</td>";
                    }

                    if($row["pm_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["pm_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["pm_in"] . "</td>";
                    }
                    
                    if($row["pm_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["pm_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["pm_out"] . "</td>";
                    }
                    echo "</tr>";
            }
                echo "</tbody>";
                echo "</table>";
        } else {
            // Handle case when no records are found
            echo "No Records Found";
        }
        
    }

    if(isset($_POST['emp_id'])){
        $emp_id = ($_POST['emp_id']);
        $selected_date = ($_POST['select_date']);
        list($year, $month) = explode('-', $selected_date);
        
        echo "<script>console.log('".$year."')</script>";

        $sql = "SELECT atlog.emp_id, atlog.atlog_DATE, employee.first_name, employee.last_name, employee.middle_name, employee.shift,employee.contract, atlog.am_in, atlog.am_out, atlog.pm_in, atlog.pm_out, atlog.am_late, atlog.pm_late, atlog.am_underTIME, atlog.pm_underTIME, atlog.night_differential
        FROM atlog
        JOIN employee ON atlog.emp_id = employee.emp_id
        WHERE MONTH(atlog.atlog_DATE) = '$month' AND YEAR(atlog.atlog_DATE) = '$year' AND atlog.emp_id = '$emp_id'";
        
        $result = mysqli_query($conn, $sql);
        

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th scope='col'>Emp ID</th>";
                        echo "<th scope='col'>Date</th>";
                        echo "<th scope='col'>AM IN</th>";
                        echo "<th scope='col'>AM OUT</th>";
                        echo "<th scope='col'>PM IN</th>";
                        echo "<th scope='col'>PM OUT</th>";
                        echo "<th scope='col'>Overtime</th>";
                    echo "</tr>";
                echo "</thead>";

                echo "<tbody class='table_body' id='table_body'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["emp_id"] . "</td>";
                    echo "<td>" . $row["atlog_DATE"] . "</td>";

                    if($row["am_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["am_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["am_in"] . "</td>";
                    }

                    if($row["am_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["am_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["am_out"] . "</td>";
                    }

                    if($row["pm_late"] == "YES"){
                        echo "<td style='color:red'>" . $row["pm_in"] . "</td>";
                    }
                    else{
                        echo "<td>" . $row["pm_in"] . "</td>";
                    }
                    
                    if($row["pm_underTIME"]== "YES"){
                        echo "<td style='color:blue'>" . $row["pm_out"] . "</td>";
                    }else{
                        echo "<td>" . $row["pm_out"] . "</td>";
                    }
                    echo "</tr>";
            }
                echo "</tbody>";
                echo "</table>";
        } 
    }
?>