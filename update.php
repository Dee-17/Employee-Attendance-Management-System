<?php 
include "connection.php";

$sql = "UPDATE atlog 
        SET am_late = IF(TIMEDIFF(am_in, '8:00:00') > '00:00:00', 'YES', 'NO'),
            am_underTIME = IF(TIMEDIFF('11:00:00', am_out) > '00:00:00', 'YES', 'NO'),
            pm_late = IF(TIMEDIFF(pm_in, '16:00:00') > '00:00:00', 'YES', 'NO'),
            pm_underTIME = IF(TIMEDIFF('17:00:00', pm_out) > '00:00:00', 'YES', 'NO'),
            work_hour = ADDTIME(IFNULL(TIMEDIFF(pm_out, pm_in), '00:00:00'), IFNULL(TIMEDIFF(am_out, am_in), '00:00:00')),
            overtime = overtime = 
                        ADDTIME(
                            IF(
                                IFNULL(TIMEDIFF(am_out, am_in), '00:00:00') > '02:00:00',
                                TIMEDIFF(am_out, am_in),
                                '00:00:00'
                            ),
                            IF(
                                IFNULL(TIMEDIFF(pm_out, pm_in), '00:00:00') > '02:00:00',
                                TIMEDIFF(pm_out, pm_in),
                                '00:00:00'
                            )
                        )";

$conn->query($sql);
?>
