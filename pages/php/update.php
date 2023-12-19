<?php 
    include "connection.php";

    $sql = "UPDATE atlog 
            
            SET am_late = IF(TIMEDIFF(am_in, '8:00:00') > '00:00:00', 'YES', 'NO'), -- Check if the morning in-time is later than 8:00 AM, set 'YES' if true, 'NO' otherwise
                am_underTIME = IF(TIMEDIFF('11:00:00', am_out) > '00:00:00', 'YES', 'NO'), -- Check if the morning out-time is later than 11:00 AM, set 'YES' if true, 'NO' otherwise
                pm_late = IF(TIMEDIFF(pm_in, '16:00:00') > '00:00:00', 'YES', 'NO'), -- Check if the afternoon in-time is later than 4:00 PM, set 'YES' if true, 'NO' otherwise
                pm_underTIME = IF(TIMEDIFF('17:00:00', pm_out) > '00:00:00', 'YES', 'NO'), -- Check if the afternoon out-time is later than 5:00 PM, set 'YES' if true, 'NO' otherwise
                work_hour = ADDTIME(IFNULL(TIMEDIFF(pm_out, pm_in), '00:00:00'), IFNULL(TIMEDIFF(am_out, am_in), '00:00:00')), -- Calculate the total work hours by summing the morning and afternoon work hours
                overtime = 
                    CASE
                        WHEN am_in IS NULL OR pm_in IS NULL THEN -- If either morning or afternoon in-time is missing, calculate overtime based on a 4-hours workday, overtime hours starts counting at + 2 hours
                            IF(work_hour > '06:00:01', TIMEDIFF(work_hour, '06:00:00'), '00:00:00')
                        WHEN am_in IS NOT NULL AND pm_in IS NOT NULL THEN -- If both morning and afternoon in-times are present, calculate overtime based on a 8-hours workday, overtime hours starts counting at + 2 hours
                            IF(work_hour > '10:00:01', TIMEDIFF(work_hour, '10:00:00'), '00:00:00')
                        ELSE
                            '00:00:00' -- Default case, set overtime to '00:00:00'
                    END";  

    $conn->query($sql);
    ?>
