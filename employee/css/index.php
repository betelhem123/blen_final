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
		<li class="active">
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
            <li >
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
				<a href="backup.php">
					<i class='bx bx-cloud-upload icon' ></i>
					<span class="text">Backup</span>
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
		<!-- top box-->
		<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/12.jpg" alt="">
					</div>
					<div class="col-md-8">

						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">NAME</div>
						</h4>
						<p class="font-18 max-width-1000">ReLink Technologies <br> INNOVATIVE IN ACTION</p>
					</div>
				</div>
			</div>
			
			</div>
		<!-- MAIN -->
		<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						
						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"></div>
								<div class="font-14 text-secondary weight-500">Total Employees </div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);"><i class="icon-copy dw dw-user-2"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						        

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"></div>
								<div class="font-14 text-secondary weight-500">Total Departments</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);"><span class="icon-copy fa fa-users"></span></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						  

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"></div>
								<div class="font-14 text-secondary weight-500">Total HR</div>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);"><i class="icon-copy fa  fa-user-circle-o" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">

						        

						<div class="d-flex flex-wrap">
							<div class="widget-data">
								<div class="weight-700 font-24 text-dark"></div>
								<div class="font-14 text-secondary weight-500">Pending Leave</div>
							</div>
							<div class="widget-icon">
								<div class="icon"><i class="icon-copy fa fa-hourglass-end" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Department Heads</div>
							<div class="table-actions">
								<a title="VIEW" href="staff.php"><i class="icon-copy ion-disc" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></i></a>	
							</div>
						</div>
						<div class="user-list">
							<ul>
															</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Staff</div>
							<div class="table-actions">
								<a title="VIEW" href="staff.php"><i class="icon-copy ion-disc" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></i></a>	
							</div>
						</div>

						<div class="user-list">
							<ul>
								
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="../uploads/NO-IMAGE-AVAILABLE.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">LIb</span>
											<div class="font-14 weight-600"></div>
											<div class="font-12 weight-500" data-color="#b2b1b6" style="color: rgb(178, 177, 182);"></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></div>
								</li>
								
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="../uploads/NO-IMAGE-AVAILABLE.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);"></span>
											<div class="font-14 weight-600"> </div>
											<div class="font-12 weight-500" data-color="#b2b1b6" style="color: rgb(178, 177, 182);"></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></div>
								</li>
															</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-20">
					<div class="card-box height-100-p pd-20 min-height-200px">
						<div class="d-flex justify-content-between">
							<div class="h5 mb-0">Staff</div>
							<div class="table-actions">
								<a title="VIEW" href="staff.php"><i class="icon-copy ion-disc" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></i></a>	
							</div>
						</div>

						<div class="user-list">
							<ul>
							
								
								<li class="d-flex align-items-center justify-content-between">
									<div class="name-avatar d-flex align-items-center pr-2">
										<div class="avatar mr-2 flex-shrink-0">
											<img src="../uploads/NO-IMAGE-AVAILABLE.jpg" class="border-radius-100 box-shadow" width="50" height="50" alt="">
										</div>
										<div class="txt">
											<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);"></span>
											<div class="font-14 weight-600"> </div>
											<div class="font-12 weight-500" data-color="#b2b1b6" style="color: rgb(178, 177, 182);"></div>
										</div>
									</div>
									<div class="font-12 weight-500" data-color="#17a2b8" style="color: rgb(23, 162, 184);"></div>
								</li>
															</ul>
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