<?php 
    include "connection.php";

    //function para i-display lahat ng rows on current month 
    if(isset($_POST['table_onload'])){
        $date_picked = ($_POST['table_onload']);
        
        echo "<script>console.log($date_picked);</script>";
    
    }
    //function para sa specific date lang and specific person
    elseif(isset($_POST['emp_id'])){
        $emp_id = ($_POST['emp_id']);
        $sql = "SELECT * FROM employee WHERE emp_id = $emp_id";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        }
        else{
            echo json_encode(array('error' => 'No Records Found'));
        }
    }
?>