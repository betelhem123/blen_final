<?php
     session_start();
     error_reporting(0);
     require_once '../includes/db.inc.php';
     if(strlen($_SESSION['manlogin'])==0){   
     header('location:../login.php');
    } else { 
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/admin.css">
	
	<title>ADDEMPLOYEE</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='bx  bx-recycle'></i>
			<span class="text">ReLink Technologies </span>
		</a>
		<ul class="side-menu top">
		<li>
				<a href="index.php">
                <i class=' bx bx bxs-dashboard icon ' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li >
				<a href="leave.php">
					<i class='bx bx-message-rounded-check icon' ></i>
					<span class="text">leave requests</span>
				</a>
			</li>
			<li  class="active">
				<a href="employeeprofile.php">
					<i class='bx  bx bxs-user-detail icon'></i>
					<span class="text">Employee Profile</span>
				</a>
			</li>
			<li >
				<a href="department.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Department</span>
				</a>
			</li>
			<li >
				<a href="new_leave.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Leave Type</span>
				</a>
			</li>
			<li >
				<a href="viewcalendar.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
				</a>
			</li>
			<li>
        <a href="http://localhost/phpmyadmin/index.php?route=/database/export&db=blendb">
          <i class='bx bx-cloud-upload icon' ></i>
          <span class="text">Backup</span>
        </a>
      </li>
      <li>
        <a href="http://localhost/phpmyadmin/index.php?route=/database/import&db=blendb">
          <i class='bx bx-cloud-download icon' ></i>
          <span class="text">Restore</span>
        </a>
      </li>
	
	  <li>
				<a href="change_password.php" >
					<i class='bx bx-log-out icon'></i>
					<span class="text">Change Password</span>
				</a>
			</li>
		
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bx-log-out icon' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		
		</nav>
		<!-- NAVBAR -->
<!-- MAIN -->
<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/4.jpg" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 ">Add Employee</div>
						</h4>
						<p class="font-18 max-width-600">fill the whole information below</p>
					</div>
				</div>
			</div>
				
					
				

			
				

			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="t h4"> Information Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
						<form action="../includes/addemployee.inc.php" method="post">
							<section>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>First Name :</label>
											<input name="firstname" type="text" class="form-control wizard-required" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Last Name :</label>
											<input name="lastname" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Email Address :</label>
											<input name="email" type="email" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="password">Password :</label>
											<input name="password" type="password" id="password" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label for="passwordrepeat">Confirm Password :</label>
											<input name="passwordrepeat" type="password" id="passwordrepeat" placeholder="**********" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Gender :</label>
											<select name="gender" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Gender</option>
												<option value="male">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
								<div>	
								<div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Phone Number :</label>
											<input name="phonenumber" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Date Of Birth :</label>
											<input name="dob" type="date" class="form-control date-picker" required="true" autocomplete="off">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Address :</label>
											<input name="adress" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>	
								
								<div class="row">
								<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Department :</label>
											<?php
													require_once '../includes/db.inc.php';
													require_once '../select.php';
													?>
												<select name="Department" class="custom-select form-control" required="true" autocomplete="off">
													<option>Select Department</option>
													<?php 
													foreach ($options as $option) {
													?>
													<option value="<?php echo $option['dep_id']; ?>"><?php echo $option['departmentname']; ?> </option>
													<?php 
													}
											?>
										        </select>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User Role :</label>
											<select name="position" class="custom-select form-control" required="true" autocomplete="off">
												<option value="">Select Role</option>
												<option value="manager">Manager</option>
												<option value="humanresource">HR</option>
												<option value="staff">Staff</option>
											</select>
										</div>
									</div>
									
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label style="font-size:16px;"><b></b></label>
											<div class="modal-footer justify-content-center">
												
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>User ID :</label>
											<input name="userID" type="text" class="form-control" required="true" autocomplete="off">
										</div>
									</div>
								</div>

								<!-- <div class="row">
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Staff Leave Days :</label>
											<input name="leave_days" type="number" class="form-control" required="true" autocomplete="off">
										</div>
									</div> -->
									
									<button class="btn btn-primary" type="submit" name="submit" id="add_staff" data-toggle="modal" >&nbsp;Register</button>

									
								
							</section>
						</form>
					</div>
				</div>
				<?php

if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all fields!</p>";
    }
    else if($_GET["error"] == "invalidusername"){
        echo "<p>Choose a proper username!</p>";
    }
    else if($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email!</p>";
    }
    else if($_GET["error"] == "passwordsdontmatch"){
        echo "<p>password don't match!</p>";
    }
    else if($_GET["error"] == "stmtfailed"){
        echo "<p>something went wrong, try again!</p>";
    }
    else if($_GET["error"] == "usernametaken"){
        echo "<p>username already taken!</p>";
    }
    else if($_GET["error"] == "none"){
        echo "<p>Registeration Successful!</p>";
    }
}
?>
	<!-- CONTENT -->

	<script src="js/adminjs.js"></script>
</body>
</html>
<?php }?>