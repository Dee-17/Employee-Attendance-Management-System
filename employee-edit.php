<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Employee Info</title>
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
			<div class="header row container-fluid align-items-top">
				<div class="col col-10 m-0 p-0"><p class="header_title"><span class="blue_title">Edit</span> Employee Information</p></div>
				<div class="col col-auto m-0 p-0 ms-auto">
					<a href="employee-maintenance.php" class="nav-link"><button type="button" class="exit_button btn btn-secondary py-2 px-3">Go Back</button></a>
				</div>
			</div>
			<div class="container-fluid gap-3">
				<div class="row p-0 mx-0 justify-content-evenly">
					<!-- Employee form -->
					<div class="card py-5 px-4">
						<form class="register_form row g-3">
							<div class="col-md-4">
								<label for="inputFirstName" class="form-label">First Name</label>
								<input type="text" class="form-control" id="input-first-name" placeholder="Enter first name">
							</div>
							<div class="col-md-4">
								<label for="inputMiddleName" class="form-label">Middle Name</label>
								<input type="input-middle-name" class="form-control" id="input-middle-name" placeholder="Enter middle name">
							</div>
							<div class="col-md-4">
								<label for="inputLastName" class="form-label">Last Name</label>
								<input type="text" class="form-control" id="input-last-name" placeholder="Enter last name">
							</div>
							<div class="col-10">
								<label for="inputAddress" class="form-label">Address</label>
								<input type="text" class="form-control" id="input-address" placeholder="1234 Main St">
							</div>
							<div class="col-2">
								<label for="inputZIP" class="form-label">ZIP Code</label>
								<input type="text" class="form-control" id="input-zip" placeholder="1234">
							</div>
							<div class="col-4">
								<label for="inputContactNumber" class="form-label">Contact Number</label>
								<input type="text" class="form-control" id="input-contact-number" placeholder="0912345678">
							</div>
							<div class="col-md-8">
								<label for="inputEmailAddress" class="form-label">Email Address</label>
								<input type="text" class="form-control" id="input-email-address" placeholder="example123@email.com">
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
				<div class="card white_container container-fluid row mt-3 text-center">
					<form class="d-flex register_button m-0 p-2 justify-content-between">
						<!-- Reply to user after submitting forms -->
						<div class="grey_container col col-10 d-flex align-items-center justify-content-center m-0 p-0">
							<p class="pop_out_text m-0">Fill out the required fields before you submit.</p>
						</div>
						<!-- Submit button -->
						<div class="col col-auto p-0">
							<button type="submit" class="btn btn-outline-primary px-5 py-2">Submit</button>
						</div>
					</form>
				</div>
			</div>

		</div>
  	</div>
</body>
</html>