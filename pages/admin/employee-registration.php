<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Employee</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/nav-bar.css">
  <link rel="stylesheet" href="../css/employee-registration.css">
  <script src="../js/nav-bar.js" defer></script>
</head>
<body class="container-fluid">
  	<div class="container-fluid row gap-0">
		<!-- Navigation Bar -->
		<?php
			include('../php/nav-bar.php');
		?>
		<!-- Main contents -->
		<div class="right_panel container p-5">
			<div class="header row container-fluid align-items-top">
				<div class="col col-10 m-0 p-0"><p class="header_title">Employee <span class="blue_title">Registration</span></p></div>
				<div class="col col-auto m-0 p-0 ms-auto exit_button">
					<a href="employee-maintenance.php" class="nav-link"><button type="button" class="btn btn-secondary py-2 px-3">Go Back</button></a>
				</div>
			</div>
			<div class="container-fluid gap-3">
				<div class="row p-0 mx-0 justify-content-evenly">
					<!-- Registration form -->
					<div class="card py-5 px-4">
						<form action="employee-add.php" method="post" class="register_form row g-3">
							<div class="col-md-4">
								<label for="inputFirstName" class="form-label">First Name</label>
								<input type="text" class="form-control" id="input-first-name" name="input-first-name" placeholder="Enter first name" required>
							</div>
							<div class="col-md-4">
							<label for="inputMiddleName" class="form-label">Middle Name</label>
								<input type="input-middle-name" class="form-control" id="input-middle-name" name="input-middle-name" placeholder="Enter middle name" required>
							</div>
							<div class="col-md-4">
								<label for="inputLastName" class="form-label">Last Name</label>
								<input type="text" class="form-control" id="input-last-name" name="input-last-name" placeholder="Enter last name" required>
							</div>
							<div class="col-10">
								<label for="inputAddress" class="form-label">Address</label>
								<input type="text" class="form-control" id="input-address" name="input-address" placeholder="1234 Main St" required>
							</div>
							<div class="col-2">
								<label for="inputZIP" class="form-label">ZIP Code</label>
								<input type="text" class="form-control" id="input-zip" name="input-zip" placeholder="4500" required>
							</div>
							<div class="col-4">
								<label for="inputContactNumber" class="form-label">Contact Number</label>
								<input type="text" class="form-control" id="input-contact-number" name="input-contact-number" placeholder="09123456789" required>
							</div>
							<div class="col-md-8">
								<label for="inputEmailAddress" class="form-label">Email Address</label>
								<input type="text" class="form-control" id="input-email-address" name="input-email-address" placeholder="example123@email.com" required>
							</div>
							<div class="col-md-4">
							<label for="inputEmployeeContract" class="form-label">Employee Contract</label>
								<select id="input-employee-contract" name="input-employee-contract" class="form-select" required>
								<option>Part Time</option>
								<option>Full Time</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="inputShift" class="form-label">Shift</label>
								<select id="input-shift" name="input-shift" class="form-select" required>
								<option>Morning Shift</option>
								<option>Afternoon Shift</option>
								<option>Day Shift</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="inputPassword4" class="form-label">Password</label>
								<input type="password" class="form-control" id="input-pasword" name="input-password" placeholder="Enter employee password" required>
							</div>
					</div>
				</div>
				<div class="card white_container container-fluid row mt-3 text-center">
					<div class="d-flex register_button m-0 p-2 justify-content-between">
						<!-- Reply to user after submitting forms -->
						<div class="grey_container col col-9 d-flex align-items-center justify-content-center m-0 p-0">
							<p class="pop_out_text m-0">Fill out the required fields before you register.</p>
						</div>
						<!-- Register button -->
						<div class="col col-auto p-0">
							<button type="submit" class="btn btn-outline-primary px-5 py-2">Register Employee</button>
						</div>
					</div>
				</div>
				</form> 
				<!-- closes the form -->
			</div>
		</div>
  	</div>
</body>
</html>