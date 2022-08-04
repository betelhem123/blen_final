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
	<!-- link of icon-->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- CSS -->
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/back.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/icon-font.min.css">
	<title>Dashboard</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class='bx  bx-recycle'></i>
			<span class="text">ReLink Technologies </span>
		</a>
		<ul class="side-menu top">
		<li >
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
			<li>
				<a href="leave.php">
					<i class='bx bx-message-rounded-check icon' ></i>
					<span class="text">leave requests</span>
				</a>
			</li>
			<li>
				<a href="employeeprofile.php">
					<i class='bx  bx bxs-user-detail icon'></i>
					<span class="text">Employee Profile</span>
				</a>
			</li>
            <li  class="active">
				<a href="department.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Department</span>
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
				<i class='bx bx-select-multiple'></i>
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
			<!-- NAVBAR -->

	<section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/10.gif" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 ">Leave Types</div>
						</h4>
					</div>
				</div>
			</div>
		<!-- top box-->

		<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Edit Leave Type</h2>
								<section>
		
<form action="../includes/new_update_leavetype.inc.php?upd=<?php echo $_GET['upd'];?>", method="POST">
<div class="row">
										<div class="col-md-12">
											<div class="form-group">
<?php 
require_once '../includes/db.inc.php';

$upd=intval($_GET['upd']);
$sql = "SELECT * FROM  leave_types WHERE lt_id=".$upd;

$stmt = $conn -> query($sql);
$rowCount = $stmt->num_rows;



if($rowCount > 0)
{
while($rows=$stmt->fetch_assoc())
{               
?> 

<div>
            <label for="leavetpe">Department Name:</label>
            <input type="text" name="leavetype"  class="form-control"id="leavetype" value="<?php echo $rows['category'];?>" required>
        </div>
        <div>
            <label for="desc">Code:</label>
            <input type="text" class="form-control" name="desc" id="desc" value="<?php echo $rows['description'];?>" required>
        </div>
     
</select>
 <?php }
    }?>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
             </form>

					

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="js/adminjs.js"></script>
</body>
</html>
<?php }?>