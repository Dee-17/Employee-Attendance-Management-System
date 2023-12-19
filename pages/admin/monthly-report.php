<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">    
    <link rel="stylesheet" href="../css/monthly-report.css">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/nav-bar.js" defer></script>
    <script src="../js/date-time.js" defer></script>
    <script src="../js/month-year-calendar.js" defer></script>
    
        <script>
        $(document).ready(function(){
            //On Load
            var today = new Date().toLocaleDateString();
            var curr = new Date();
            var month = curr.getMonth() + 1; 
            var year = curr.getFullYear();
            var global_date_pick = [year, month].join('-');
            
            $("#table_vals").load("monthly-load.php",{
                table_onload: JSON.stringify(today),
                }); 
            $("#search_button").click(function(){
                var date_pick = document.getElementById('picked_date').value;
                global_date_pick = date_pick;
                $("#table_vals").load("monthly-load.php",{
                    select_date: JSON.stringify(date_pick),
                })
            })
            //search
            $("#search_ID").click(function(){
                var employee_Id = document.getElementById('emp_search').value;
                $("#table_vals").load("monthly-load.php",{
                    emp_id:employee_Id,
                    select_date:global_date_pick
                })

                // Fetch the JSON data from 'monthly-search.php'
                $.post('monthly-search.php', { emp_id: employee_Id }, function(data) {
                    updateEmployeeInfo(data);
                }, 'json');
                
                // Update the employee information based on the JSON data
                function updateEmployeeInfo(data) {
                    $('[name="emp_id"]').val(data.emp_id);
                    $('[name="emp_name"]').val(data.full_name);
                    $('[name="emp_contract"]').val(data.contract);
                    $('[name="emp_shift"]').val(data.shift);
                }
            });
        });
    </script>
</head>
<body class="container-fluid">
    <div class="container-fluid row gap-0">
        <?php 
            include('../php/nav-bar.php');
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
                    <p>Select the month and year</p>
                <input class="form-control" type="month" name="date_picker" id="picked_date">
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
            <div class="header row container-fluid align-items-center m-0 p-0 gap-2">
				<div class="col col-10 m-0 p-0"><p class="header_title"><span class="blue_title">Monthly Log in</span> Report</p></div>
				<!-- Export button -->
                <div class="col col-auto m-0 p-0 ms-auto export_button">
                    <button id="exportButton" class="btn btn-secondary m-0">Export to PDF</button>
				</div>
                <!-- Refresh button -->
                <div class="refresh_button col col-auto p-0">
                    <a href="monthly-report.php"><button type="button" class="btn btn-primary w-100"><i class="bi bi-arrow-clockwise"></i></button></a>
                </div>
			</div>
            <!-- First row -->
            <div class="row container-fluid mt-2 gap-3 d-flex">
                <!-- Display the date chosen by user -->
                <!-- hidden by default -->
                <div class="date_container card px-4 py-2 col col-4 justify-content-center" style="display: none;" id="date_picked">
                    <p class="date_subtitle">Viewing log in reports during</p>
                    <p class="date_title" id="selected_date"></p>
                </div>
                <div class="date_container card px-4 py-2 col col-4 justify-content-center" id="current_date">
                    <p class="date_subtitle">Viewing log in reports today</p>
                    <p class="date_title" id="month_year"></p>
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
                    <div class="legend_green"><i class="bi bi-square-fill"></i><span class="mx-1">Overtime</span></div>
                </div>
            </div>
            <!-- Employee search and info -->
            <div class="row container-fluid mt-4 gap-3 d-flex justify-content-between gap-2">
            <!-- Employee information -->
                <div class="col col-7-sm p-0">
                    <div class="row m-0 p-0 gap-3">
                        <div class="card px-3 py-3 col">
                            <form action="" class="employee_info d-flex gap-2 justify-content-between">
                                <div class="col col-1">
                                    <label for="emp_id" class="form-label m-0">Emp ID</label>
                                    <input class="form-control" type="text" name="emp_id" disabled readonly>
                                </div>
                                <div class="col col-6-sm employee_name">
                                    <label for="emp_name" class="form-label m-0">Full name</label>
                                    <input class="form-control" type="text" name="emp_name"id="full_name" disabled readonly>
                                </div>
                                <div class="col col-3-sm">
                                    <label for="emp_contract" class="form-label m-0">Contract</label>
                                    <input class="form-control" type="text" name="emp_contract" disabled readonly>
                                </div>
                                <div class="col col-2-sm">
                                    <label for="emp_shift" class="form-label m-0">Shift</label>
                                    <input class="form-control" type="text" name="emp_shift" disabled readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Employee search -->
                <div class="col col-4 p-0">
                    <div class="row m-0 p-0 gap-3">
                        <div class="card px-3 py-3 col m-0">
                            <form class="employee_search d-flex gap-2">
                                <div class="col col-9 m-0 p-0">
                                    <input type="text" id="emp_search" class="form-control" name="emp_id" placeholder="Enter employee id">
                                </div>
                                <div class="col col-2 m-0 p-0">
                                    <input class="btn btn-primary" id="search_ID" type="button" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reports -->
            <div class="white_container row mt-3 p-4 mx-0 text-center justify-content-evenly" id="table_vals">
                </table>
            </div>
        </div>
    </div>

    <script>
        // export a printable file of reports
        document.getElementById('exportButton').addEventListener('click', function() {
            
            const selectedDate = document.getElementById('selected_date').innerHTML; // Get the selected date
            const currentDate = document.getElementById('month_year').innerHTML; // Get the current date
            const employeeName = document.getElementById('full_name').value; // Get the surname of the employee (assuming there's an input field for the surname)

            let fileName = 'monthly_report'; // default file name
            let finalDate = '';

            // if there is a selected date, set it as the file name as well as the date
            if (selectedDate) {
                fileName = selectedDate;
                finalDate = selectedDate;
            } else {
                // else use current date
                fileName = currentDate; 
                finalDate = currentDate;
            }

            if (employeeName) {
                fileName = finalDate + '_' + employeeName; // If an employee is selected, use date and surname for the file name
            } else {
                fileName = finalDate; // If no employee is selected, use only the date for the file name
            }

            const pdf = new jsPDF();
            
            const contentDiv = document.getElementById('table_rows');
            // Define the column widths
            const columnWidths = [20, 32, 22, 22, 22, 22, 22, 22]; // Replace with the desired widths for each column

            pdf.autoTable({
                html: contentDiv,
                startY: 30,
                theme: 'grid',
                columnStyles: {
                    0: { cellWidth: columnWidths[0], halign: 'center' },
                    1: { cellWidth: columnWidths[1], halign: 'center' },
                    2: { cellWidth: columnWidths[2], halign: 'center' },
                    3: { cellWidth: columnWidths[3], halign: 'center' },
                    4: { cellWidth: columnWidths[4], halign: 'center' },
                    5: { cellWidth: columnWidths[5], halign: 'center' },
                    6: { cellWidth: columnWidths[6], halign: 'center' },
                    7: { cellWidth: columnWidths[7], halign: 'center' },
                    8: { cellWidth: columnWidths[8], halign: 'center' },
                },
                headerStyles: {
                fillColor: [7, 37, 96],
                textColor: [255, 255, 255],
                halign: 'center' // Center align for the header cells
            }
            });
            
            if (!employeeName) {
                pdf.text(finalDate + ' Monthly Report', 15, 15);
            } else {
                pdf.text(finalDate + ' Monthly Report', 15, 15);
                pdf.text('Name: ' + employeeName, 15, 25);
          }
            pdf.save(fileName + '.pdf'); // Save the PDF with the constructed file name

        });
    </script>
</body>
</html>