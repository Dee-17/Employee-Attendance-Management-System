<?php 
include "connection.php";
    $sql = "UPDATE atlog SET am_late = IF(TIMEDIFF(am_in, '8:29:00') > '00:12:00', 'YES', 'NO')";
        $sql .= ", am_underTIME= IF(TIMEDIFF(am_out,'11:30:00') > '00:30:00', 'YES', 'NO')";
        $sql .= ", pm_late = IF(TIMEDIFF(pm_in, '16:30:00') > '00:30:00', 'YES', 'NO')";
        $sql .= ", pm_underTIME = IF(TIMEDIFF(pm_out,'17:30:00') > '00:30:00', 'YES', 'NO')";
        $sql .= ", night_differential = IF(pm_out < '22:00:00', 0, TIME_TO_SEC(TIMEDIFF(pm_out, '6:00:00')) * 0.10 / 3600)";

    $conn->query($sql);
?>