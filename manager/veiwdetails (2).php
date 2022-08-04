<?php
    session_start();
    error_reporting(0);
    require_once '../includes/db.inc.php';
    if(strlen($_SESSION['manlogin'])==0){   
   header('location:../login.php');
   } else { 
    require_once '../includes/db.inc.php';
    // code for update the read notification status
    $isread=1;
    $did=intval($_GET['leaveid']);  
    date_default_timezone_set('Africa/Addis_Ababa');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $sql="UPDATE requested_leaves set isread=? where leave_id=?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param('ss',$isread,$did);
    $stmt -> execute();
//echo($did);

    // code for action taken on leave
    if(isset($_POST['update'])){ 
		$did=intval($_GET['leaveid']);
		//echo ($did);
		$description=$_POST['description'];
		$status=$_POST['status'];   
		date_default_timezone_set('Africa/Addis_Ababa');
		$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
		

		// get employee id first
		$getid_sql = "SELECT requested_leaves.leave_id as lid,employee.f_name,employee.l_name,employee.userID,employee.emp_id,employee.gender,employee.phone,employee.email,requested_leaves.leavetype,requested_leaves.todate,requested_leaves.fromdate,requested_leaves.postingdate,requested_leaves.Status,requested_leaves.manager_remark,requested_leaves.remark_date from requested_leaves join employee on requested_leaves.id_emp=employee.emp_id where requested_leaves.leave_id=".$did;
		$stmt = $conn -> query($getid_sql);
		$emp_data = $stmt->fetch_all(MYSQLI_ASSOC);
		echo ($stmt->num_rows);
		$userID=0;
		foreach($emp_data as $empp)
		{
			$userID = $empp["emp_id"];
		}
		echo($userID);
		// decremet the value of available leave
		$leave_sql = "UPDATE employee set available_leave_date = available_leave_date-1 where emp_id=?;";
		// $sql="UPDATE employee SET f_name=?,l_name=?,email=?,adress=?,gender=?,position=?,dob=?,dep_id=?,phone=?,available_leave_date=? WHERE emp_id=?";
		$stmt = $conn -> prepare($leave_sql);
		// echo("errro");
		$stmt -> bind_param('i',$userID);
		$stmt->execute();

		$sql="UPDATE requested_leaves set manager_remark=?,Status=?,remark_date=? where leave_id=?";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param('ssss',$description,$status,$admremarkdate,$did);
		$stmt -> execute();
		$msg="Leave updated Successfully";
    } ?>
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
	<link rel="stylesheet" href="css/tablee.css">
	<title>Manager</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">BLEN </span>
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
			<a href="#" class="nav-link">Categories</a>
			
			
		</nav>
		<!-- NAVBAR -->
		<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/6.jpg" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							REQUEST
						</h4>
						
						<p class="font-18 max-width-600"></p>
						
					</div>
				</div>
		
</div>

			</div>
		<!-- MAIN -->
		<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Leave Details</h4>
							<p class="mb-20"></p>
						</div>
						
					</div>
					<div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center">
                                            
                                            <tbody>

                                            <?php 
                                            $lid=intval($_GET['leaveid']);
                                            $sql = "SELECT requested_leaves.leave_id as lid,employee.f_name,employee.l_name,employee.userID,employee.emp_id,employee.gender,employee.phone,employee.email,requested_leaves.leavetype,requested_leaves.todate,requested_leaves.fromdate,requested_leaves.postingdate,requested_leaves.Status,requested_leaves.manager_remark,requested_leaves.remark_date from requested_leaves join employee on requested_leaves.id_emp=employee.emp_id where requested_leaves.leave_id=".$lid;
                                            $stmt = $conn -> query($sql);
                                           // $stmt -> bind_param('s',$lid);
                                            //echo($lid);

                                            //$stmt->execute();
                                            $rowCount = $stmt->num_rows;
                                            //echo($rowCount);
                                            $cnt=1;
                                            if($rowCount>0)
                                            {
                                            while($rows=$stmt->fetch_assoc())
                                            {         
                                                ?>

                                                

                                    
									<tr>

										<td ><b>User ID:</b></td>
										<td colspan="1"><?php echo $rows['userID'];?></td>

										<td> <b>Employee Name:</b></td>
										<td colspan="1"><a href="update_employee.php?empid=<?php echo $rows['emp_id'];?>" target="_blank">
										<?php echo $rows['f_name']." ".$rows['l_name'];?></a></td>

										<td ><b>Gender :</b></td>
										<td colspan="1"><?php echo $rows['gender'];?></td>
									</tr>

									<tr>
										<td ><b>Employee Email:</b></td>
										<td colspan="1"><?php echo $rows['email'];?></td>

										<td ><b>Employee Contact:</b></td>
										<td colspan="1"><?php echo $rows['phone'];?></td>

										<td ><b>Leave Type:</b></td>
										<td colspan="1"><?php echo $rows['leavetype'];?></td>

									</tr>

									<tr>

										<td ><b>Leave From:</b></td>
										<td colspan="1"><?php echo $rows['fromdate'];?></td>

										<td><b>Leave Upto:</b></td>
										<td colspan="1"><?php echo $rows['todate'];?></td>

									</tr>



									<tr>
										<td ><b>Leave Applied:</b></td>
										<td><?php echo $rows['postingdate'];?></td>

										<td ><b>Status:</b></td>
										<td><?php $stats=$rows['Status'];
										if($stats==1){
										?>
										<span style="color: green">Approved</span>
										<?php } if($stats==2)  { ?>
										<span style="color: red">Declined</span>
										<?php } if($stats==0)  { ?>
										<span style="color: blue">Pending</span>
										<?php } ?>
										</td>


									</tr>



									<tr>
										<td ><b>Admin Remark: </b></td>
										<td colspan="12"><?php
										if($rows['manager_remark']==""){
										echo "Waiting for Action";  
										}
										else{
										echo $rows['manager_remark'];
										}
										?></td>
									</tr>

									<tr>
										<td ><b>Admin Action On: </b></td>
										<td><?php
										if($rows['remark_date']==""){
										echo "NA";  
										}
										else{
										echo $rows['remark_date'];
										}
										?></td>
									</tr>


										<?php 
										if($stats==0)
										{

										?>
									<tr>
										<td colspan="12">
											
										<form action="veiwdetails.php?leaveid=<?php echo $_GET['leaveid'];?>" method="POST" >
										<div class="modal-body">

										<select class="custom-select" name="status" required="">
										<option value="">Choose...</option>
										<option value="1">Approve</option>
										<option value="2">Decline</option>
										</select>
										</div>
										<div>
										<label for="description">Remark:</label>
										<input type="text" name="description" id="description">
										</div>
										<div class="modal-footer">
										<button type="submit" class="btn btn-success" name="update">Apply</button>
										</div>
										</div>
										</div>
										</div>

										</td>
									</tr>
										<?php } ?>
										</form>
										</tr>
										<?php $cnt++;} }?>
                                    </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
				</div>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>

</body>
</html>
<?php } ?>