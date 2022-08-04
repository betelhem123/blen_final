<?php
     session_start();
     error_reporting(0);
     require_once '../includes/db.inc.php';
     if(strlen($_SESSION['manlogin'])==0){   
    header('location:../login.php');
    } else {
      require_once '../includes/db.inc.php';
    //Inactive  Employee    
    if(isset($_GET['inid']))
    {
    $id=$_GET['inid'];
    $status=0;
    $sql = "UPDATE employee SET Status= ?  WHERE emp_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);
    $stmt -> execute();
    header('location:employeeprofile.php');
    }

    //Activated Employee
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $status=1;
    $sql = "UPDATE employee SET Status= ?  WHERE emp_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $status, $id);
    $stmt -> execute();
    header('location:employeeprofile.php');
    }
 ?>
 <?php

require_once '../includes/db.inc.php';

$sql = "SELECT emp_id,f_name,l_name,userID,dep_id,position,Status, available_leave_date from  employee";
$result = $conn->query($sql);

$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/admmin.css">
	<link rel="stylesheet" href="css/tablee.css">
	<title>EMPLOYEE PROFILE</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="INDEX.PHP" class="brand">
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
						<img src="image/6.jpg" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 ">Employee Profile</div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
				
					
			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL EMPLOYEES</h2>
					</div>
				<div class="pb-20">
				
																		<a href="add_employee.php" class="waves-effect waves-light btn green m-b-xs">ADD EMPLOYEE</a>
																	
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">#</th>
								<th>ID</th>
								<th>FULL NAME</th>
								<th>USER ID</th>
								<th>DEPARTMENT</th>
								<th>POSITION</th>
								<th>REMAINING LEAVE</th>
								<th>STATUS</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
									<?php
									// LOOP TILL END OF DATA
									while($rows=$result->fetch_assoc())
									{
									?>
								
									<tr>
									<!-- FETCHING DATA FROM EACH
										ROW OF EVERY COLUMN -->
									<td><?php echo ($cnt);?></td>
									<td><?php echo $rows['emp_id'];?></td>
									<td><?php echo $rows['f_name']. " " . $rows['l_name'];?></td>
									<td><?php echo $rows['userID'];?></td>
									<td><?php echo $rows['dep_id'];?></td>
									<td><?php echo $rows['position'];?></td>
									<td><?php echo $rows['available_leave_date'];?></td>
									<td><?php $stats=$rows['Status'];
									if($stats){?>
									<span class="badge badge-pill badge-success">Active</span>
									<?php } else { ?>
									<span class="badge badge-pill badge-danger">Inactive</span>
									<?php } ?>
									</td>
									

									<td><input type=button class="btn btn-info" onClick="location.href='update_employee.php?uid=<?php echo $rows['emp_id'];?>'" , value='Update'>
											<?php if($rows['Status']==1)
															{?>
										<input type=button class="btn btn-danger" onClick="location.href='employeeprofile.php?inid=<?php echo $rows['emp_id'];?>'", value='Inactive'>
										<?php } else {?>
										<input type=button class="btn btn-success" onClick="location.href='employeeprofile.php?id=<?php echo $rows['emp_id'];?>'", value='Active'>
										<?php } ?> 
									</td>
									
									
											<!-- <a href="editemployee.php?empid=1"><i class="material-icons">visibility</i></a>
												<a href="editemployee.php?empid=1"><i class="material-icons">mode_edit</i></a>
                                        <a href="manageemployee.php?inid=1" onclick="return confirm('Are you sure you want to inactive this Employe?');" "=""> <i class="material-icons" title="Inactive">clear</i>
 </a></td> -->
                                        
										<?php
											$cnt++; }
											?>
                                    </tbody>
					</table>
			   </div>
			</div>

	<!-- CONTENT -->

	<script src="js/adminjs.js"></script>
</body>
</html>

<?php }?> 