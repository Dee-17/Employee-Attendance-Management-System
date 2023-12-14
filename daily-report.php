<?php
    include "update.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">    
    <link rel="stylesheet" href="css/daily-report.css">
    <link rel="stylesheet" href="css/nav-bar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/nav-bar.js" defer></script>
    <script src="js/date-time.js" defer></script>
    <script src="js/full-calendar.js" defer></script>
    <script>
        $(document).ready(function(){
            var today = new Date().toISOString().slice(0,10);
            $("#table_body").load("load-rows.php",{
                table_date:today
            });

            $("#search_button").click(function(){
                var date_picked = document.getElementById('picked_date').value;
                $("#table_body").load("load-rows.php",{
                    table_date:date_picked
                });
            });
        });
    </script>

</head>
<body class="container-fluid">
    <div class="container-fluid row gap-0">
        <?php 
            include('nav-bar.php');
        ?>
        <!-- Calendar modal -->
        <div class="modal fade" id="calendar_modal" tabindex="-1" aria-labelledby="calendar_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="calendar_label">Date picker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select a date</p>
               <input class="form-control" type="date" name="date_picker" id="picked_date">
            </div>
            <div class="modal-footer">
                <button type="button" class="close_button btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <div class="search_button"><button type="button" class="btn btn-primary" id="search_button">Search</button></div>
            </div>
            </div>
        </div>
        </div>

        <!-- Main contents -->
        <div class="right_panel container p-5">
        <p class="header_title"><span class="blue_title">Daily Log in</span> Report</p>
            <!-- First row -->
            <div class="row container-fluid mt-4 gap-3 d-flex">
                <!-- Display the date chosen by user -->
                <div class="date_container card px-4 py-2 col col-4 justify-content-center" style="display: none;" id="date_picked">
                    <p class="date_subtitle">Viewing log in reports during</p>
                    <p class="date_title" id="selected_date"></p>
                </div>
                <div class="date_container card px-4 py-2 col col-4 justify-content-center" id="current_date">
                    <p class="date_subtitle">Viewing log in reports today</p>
                    <p class="date_title" id="full_date"></p>
                </div>
                <div class="card col col-1 p-0 align-items-center justify-content-center">
                    <div class="calendar_icon"><a type="button" data-bs-toggle="modal" data-bs-target="#calendar_modal"><i class="bi bi-calendar4-week" style="font-size: 2rem;"></i></a></div>
                </div>
                <!-- Display real-time clock -->
                <div class="clock_container grey_container col col-3 m-0 p-0 ms-auto">
                    <div class="clock_elements">
                        <span id="hour"></span>
                        <span id="point">:</span>
                        <span id="minute"></span>
                        <span id="point">:</span>
                        <span id="second"></span>
                        <span id="am_pm"></span>
                    </div>
                </div>
                <!-- Table legend -->
                <div class="white_container col col-2 m-0 py-3 px-4">
                    <p class="legend_title text-center">Table legend</p>
                    <div class="legend_red"><i class="bi bi-square-fill"></i><span class="mx-1">Late</span></div>
                    <div class="legend_blue"><i class="bi bi-square-fill"></i><span class="mx-1">Undertime</span></div>
                </div>
            </div>
            <!-- Reports -->
            <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly" id="table_container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Emp ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Contract</th>
                            <th scope="col">Shift</th>
                            <th scope="col">AM IN</th>
                            <th scope="col">AM OUT</th>
                            <th scope="col">PM IN</th>
                            <th scope="col">PM OUT</th>
                            <th scope="col">Overtime</th>
                        </tr>
                    </thead>

                    <tbody class="table_body" id="table_body">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>