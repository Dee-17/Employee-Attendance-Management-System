<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Maintenace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/employee-registration.css">
    <script src="js/nav-bar.js" defer></script>
</head>
<body class="container-fluid">
    <div class="container-fluid row gap-0">
        <!-- Navigation Bar -->
        <?php 
            include('nav-bar.php');
        ?>
        <!-- Main contents -->
        <div class="right_panel container p-5">
            <div class="header col col-12">
              <p class="title_2 col col-11">Employee Registration</p>
              <button type="button" class="exit_button col col-1 btn btn-secondary p-2 mx-0"><a href="employee-maintenance.php" class="nav-link">Go Back</a></button>            
            </div>                           
            <div class="container mt-4 row gap-3">
                <div class="col col-12 p-0">
                    <div class="row m-0 gap-3">  
                        <div class="grey_container col col-12-sm p-0 mx-0 justify-content-evenly">
                            <div class="col col-12 card p-3">
                                <form class="row g-3">
                                    <div class="col-md-4">
                                      <label for="inputFirstName" class="form-label">First Name</label>
                                      <input type="text" class="form-control" id="input-first-name">
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputMiddleName" class="form-label">Middle Name</label>
                                      <input type="input-middle-name" class="form-control" id="input-middle-name">
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputLastName" class="form-label">Password</label>
                                      <input type="text" class="form-control" id="input-last-name">
                                    </div>
                                    <div class="col-10">
                                      <label for="inputAddress" class="form-label">Address</label>
                                      <input type="text" class="form-control" id="input-address" placeholder="1234 Main St">
                                    </div>
                                    <div class="col-2">
                                      <label for="inputZIP" class="form-label">ZIP Code</label>
                                      <input type="text" class="form-control" id="input-zip" placeholder="1412">
                                    </div>
                                    <div class="col-4">
                                      <label for="inputContactNumber" class="form-label">Contact Number</label>
                                      <input type="text" class="form-control" id="input-contact-number" placeholder="0912345678">
                                    </div>
                                    <div class="col-md-8">
                                      <label for="inputEmailAddress" class="form-label">Email Address</label>
                                      <input type="text" class="form-control" id="input-email-address">
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputEmployeeContract" class="form-label">Employee Contract</label>
                                      <select id="input-employee-contract" class="form-select">
                                        <option selected></option>
                                        <option>Full Time</option>
                                        <option>Part Time</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                      <label for="inputShift" class="form-label">Shift</label>
                                      <select id="input-shift" class="form-select">
                                        <option selected></option>
                                        <option>Day Shift</option>
                                        <option>Night Shift</option>
                                      </select>
                                    </div>
                                  </form>
                            </div>
                        </div>
                        <div class="card white_container row mt-3 mx-0 text-center justify-content-evenly">
                          <form class="d-flex">
                            <div class="grey_container col col-8 me-3">
                                <p class="pop_out_text">Fill out the required fields before you register.</p>
                            </div>                           
                            <button type="button" class="register_button btn btn-outline-primary">Register Employee</button>                            
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>