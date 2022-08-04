<?php
    session_start();
    error_reporting(0);
    require_once '../includes/db.inc.php';
    //require_once '../include/db.inc.php';
    if(strlen($_SESSION["stflogin"])==0){   
    header('location:../login.php');
   } else { 
    //require_once 'db.inc.php';
      require_once '../includes/db.inc.php';
        if(isset($_POST['apply']))
        {

        $eid=$_SESSION["staffid"]; // the id of the user that logged in
        $leavetype=$_POST['leavetype'];
        $fromdate=$_POST['fromdate'];  
        $todate=$_POST['todate'];  
        $status=0;
        $isread=0;
                // echo ($eid);
                // echo ($leavetype);
                // echo ($fromdate);
                // echo ($todate);

        if($fromdate > $todate){
            $error=" Please enter correct details: End Data should be ahead of Starting Date in order to be valid! ";
            }

        $sql="INSERT INTO requested_leaves(leavetype,todate,fromdate,Status,isread,id_emp) VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt -> bind_param('sssiii',$leavetype,$fromdate,$todate,$status,$isread,$eid);
        $stmt -> execute();
        $lastInsertId = $conn->insert_id;

        if($lastInsertId)
        {
             $msg="Your leave application has been applied, Thank You.";
        }   else    {
            $error="Sorry, couldnot process this time. Please try again later.";
        }
    }
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
	<link rel="stylesheet" href="css/back.css">
	<link rel="stylesheet" href="css/tablee.css">
	<title>LEAVE </title>
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
			<li>
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li  class="active">
				<a href="request.php">
					<i class='bx bx-message-rounded-check icon' ></i>
					<span class="text">Request Leave</span>
				</a>
			</li>
			
		
			<li>
				<a href="viewcalendar.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
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


	
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		
		</nav>
		<!-- NAVBAR -->
		<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/6.webp" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 "> Request leave of absence</div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
		<!-- MAIN -->
		<div  class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Leave Form</h4>
							<p class="mb-20"></p>
						</div>
					</div>
					<div class="wizard-content">
<form action="request.php" method="post">
<section>
<a href="history.php" class="waves-effect waves-light btn green m-b-xs">History</a>


	<div class="col-md-6 col-sm-12">
			<div class="form-group">
	<?php
			$userID=$_SESSION["staffid"];
   
			
    $sql = "SELECT available_leave_date FROM employee WHERE emp_id =".$userID;
            $stmt = $conn->query($sql);
            //$result = $stmt->get_result();

           $row = $stmt->fetch_assoc();
		   ?>
						<label>Available Leave Days </label>
						<input name="leave_days" type="text" class="form-control" required="true" autocomplete="off" readonly="" value="<?php echo $row['available_leave_date']." "." / 15"; ?>">
			</div>
	</div>
	</div>
	<div class="row">
			<div class="col-md-12 col-sm-12">
					<div class="form-group">
							<?php
							require_once '../includes/db.inc.php';
							//require_once '../include/db.inc.php';
							//require_once 'leaveform.inc.php';
							$query ="SELECT category FROM leave_types";
							$result = $conn->query($query);
							if($result->num_rows> 0){
							$options= $result->fetch_all(MYSQLI_ASSOC);
							}
							?>
							<label>Leave Type :</label>
							<select name="leavetype" class="custom-select form-control" required="true" autocomplete="off">
							<option>Select Leave Type</option>
							<?php 
							foreach ($options as $option) {
							?>
							<option><?php echo $option['category']; ?> </option>
							<?php 
							}
							?>
            
        				</select>
					
					</div>
			</div>
	</div>
	<div class="row">
	<div class="col-md-6 col-sm-12">
	<div class="form-group">
	<label for="fromdate">Start Leave Date :</label>
	<input type="date" name="fromdate" id="fromdate" value="2022-07-11" class="form-control date-picker" required="true" autocomplete="off">
	</div>
	</div>
	<div class="col-md-6 col-sm-12">
	<div class="form-group">
	<label for="todate">End Leave Date :</label>
	<input type="date" name="todate" id="todate" value="2022-07-11" class="form-control date-picker" required="true" autocomplete="off">
	</div>
	</div>
	</div>

	<button type="submit" name="apply" class="waves-effect waves-light btn green m-b-xs">Apply</button>
	


</section>
</form>
					</div>
				</div>
				

                 
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>

</body>
</html>

<?php } ?>