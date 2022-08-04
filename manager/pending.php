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
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->

	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/tablee.css">
	<link rel="stylesheet" href="css/dropdown.css">

	<title>PENDING</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
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
			<li >
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li class="active">
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
			<li >
				<a href="department.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Department</span>
				</a>
			</li>
			<li>
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
		<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/11.gif" alt="">
					</div>
					<div class="col-md-8">

					<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 text-blue">Pending Leave Of Absence</div>
						</h4>
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="dropdown">
  <button class="dropbtn">History</button>
  <div class="dropdown-content">
    <a href="leave.php">All Requests</a>
    <a href="pending.php">Pending</a>
    <a href="rejected.php">Rejected</a>
	<a href="accepted.php">Accepted</a>

  </div>
						</h4>
						
						<p class="font-18 max-width-600"></p>
						
					</div>
				</div>
		
</div>

			</div>
		<!-- MAIN -->
		
		<div class="card-box mb-30">
				<div class="pd-20">
					</div>
				<div class="pb-20">
				
																	<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">#</th>
								<th>User ID</th>
								<th>Full Name</th>
								<th>LEAVE TYPE</th>
								<th>APPLIED ON</th>
								<th>CURRENT STATUS</th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
				<?php
                require_once '../includes/db.inc.php';
				$status=0;
                $sql = "SELECT requested_leaves.leave_id as lid,employee.f_name,employee.l_name,employee.userID,employee.emp_id,requested_leaves.leavetype,requested_leaves.postingdate,requested_leaves.Status from requested_leaves join employee on requested_leaves.id_emp=employee.emp_id where requested_leaves.Status=".$status." order by lid desc";
                $stmt = $conn->query($sql);
                echo ("");
            	$rowCount = $stmt->num_rows;
              
                $cnt=1;
               if($rowCount>0){
                while($rows=$stmt->fetch_assoc())
                {
            ?>
   <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                
                <td><?php echo ($cnt);?></td>
                <td><?php echo $rows['userID'];?></td> 
                <td><a href="update_employee.php?uid=<?php echo $rows['emp_id'];?>" 
                target="_blank"><?php echo ($rows['f_name']." ".$rows['l_name']);?></a></td>
                <td><?php echo $rows['leavetype'];?></td>
                <td><?php echo $rows['postingdate'];?></td>
                <td>
                <?php $stats=$rows['Status'];
                    if($stats==1){
                ?>
                <span style="color: green">Approved <i class="fa fa-check-square-o" aria-hidden="true"></i></span>
                <?php } if($stats==2)  { ?>
                <span style="color: red">Declined <i class="fa fa-times" aria-hidden="true"></i></span>
                <?php } if($stats==0)  { ?>
                <span style="color: blue">Pending <i class="fa fa-spinner" aria-hidden="true"></i></span>
                <?php } ?>
                </td>
                <td>
                <td><a href="veiwdetails.php?leaveid=<?php echo $rows['lid'];?>" class="btn btn-secondary btn-sm"  > View Details</a></td> 
                </td>
                                                            
                        <?php
                            $cnt++; }}
                        ?>
                                           
                                    </tbody>
					</table>
			   </div>
			</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>

</body>
</html>
<?php }?>