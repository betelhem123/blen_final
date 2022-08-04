<?php
    session_start();
    error_reporting(0);
    require_once '../includes/db.inc.php';
    if(strlen($_SESSION['stflogin'])==0){   
   header('location:../login.php');
   } else { 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/admmin.css">
	<link rel="stylesheet" href="css/stylee.css">
	<link rel="stylesheet" href="css/core.css">
	<link rel="stylesheet" href="css/tablee.css">


	<title>history</title>
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
		
		
        
			<li >
				<a href="viewcalendar.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
				</a>
			</li>
		
			<li class="active">
				<a href="request.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">Request Leave</span>
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
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
		</nav>
		<!-- NAVBAR -->
		<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/6.jpg" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 "> leave history </div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
		<!-- MAIN -->


							<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL MY LEAVE</h2>
					</div>
				<div class="pb-20">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid">
						<thead><tr>
						<th>#</th>
                                                <th >Type</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th >Applied</th>
                                                <th >Admin's Remark</th>
                                                <th>Status</th>
   </tr>
						</thead>
						<tbody>	  
						<tr >
							  <td ></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
								                                    <td></td>

                                  <td><span style="color: blue"></span>     
                                    
								   
							</tr>
							 <?php 
                                        $eid=$_SESSION["staffid"];
                                        $sql = "SELECT leavetype,todate,fromdate,postingdate,remark_date,manager_remark,Status from requested_leaves where id_emp=".$eid;
                                        $stmt = $conn -> query($sql);
                                        //$stmt -> bind_param('i',$eid);
                                        //$stmt -> execute();
                                        $rowCount = $stmt->num_rows;
                                        $cnt=1;
                                        if($rowCount>0){
                                            while($rows=$stmt->fetch_assoc())
                                            {
                                          ?> 

                                            <tr>
                                            <td><?php echo ($cnt);?></td>
                                            <td><?php echo $rows['leavetype'];?></td>
                                            <td><?php echo $rows['fromdate'];?></td>
                                            <td><?php echo $rows['todate'];?></td>
                                            <td><?php echo $rows['postingdate'];?></td>
                                            <td><?php if($rows['manager_remark']=="")
                                            {
                                            echo htmlentities('Pending');
                                            } else {

                                            echo ($rows['manager_remark']." "."at"." ".$rows['remark_date']);
                                            }

                                            ?>
                                            </td>

                                            <td> <?php $stats=$rows['Status'];
                                                if($stats==1){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($stats==2)  { ?>

                                                <span style="color: red">Not Approved</span>
                                                 <?php } if($stats==0)  { ?>

                                                <span style="color: blue">Pending</span>
                                                <?php } ?>

                                             </td>
                                        </tr>

                                         <?php $cnt++;} }?>
                                          
						</tbody>
			   </div>
			</div>
									
                
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="js/adminjs.js"></script>
</body>
</html>
<?php } ?>