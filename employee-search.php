<?php

    include "connection.php";

    if (isset($_GET["emp_id"])) {

        $emp_id = $_GET["emp_id"];

        if (!$emp_id) {
            echo "<div class='error'>Employee ID Not Specified!</div>";

            return;
        }

        echo "<h1>$emp_id</h1>";

        $sql = "SELECT Count(*) 
                FROM employee
                WHERE emp_id = '" . $emp_id . "' ";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "<p class='error'>Error: " . mysqli_error() . "</p>";
            return;
        }

        $row = mysqli_fetch_row($result);

        $count = $row[0];

        if ($count == 0) {
            echo "<p class='error'>Employee not found!</p>";

            return;
        } else {
            echo "<p class='success'>Employee #$emp_id found!</p>";

        }

    } else {
        echo "<div class='error'>No Employee ID provided!</div>";
    }

    mysqli_close($conn);

?>