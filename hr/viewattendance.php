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
	<title>ATTENDACE RECORDS</title>
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
			<li class="active">
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
		
			<li>
				<a href="employeeprofile.php">
					<i class='bx  bx bxs-user-detail icon'></i>
					<span class="text">Employee Profile</span>
				</a>
			</li>
		
			<li>
				<a href="viewcalendar.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">View Calendar</span>
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
						<img src="image/7.gif" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 "> Attendace Records</div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
		<!-- MAIN -->
		<div class="card-box mb-30">
				<div class="pd-20">
						<h2 >ALL EMPLOYEES</h2>
					</div>
					<div class="row">
          <div class="col-4">
            <input type="date" name="start" class="form-control">
          </div>
          <div class="col-4">
            <input type="date" name="end" class="form-control">
          </div>
          <div class="col-3">
            <button type="submit" class="btn btn-primary btn-fill btn-block">Show</button>
          </div>
        </div>
				<div class="pb-20">
				
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">#</th>
								<th>ID</th>
								<th>FULL NAME</th>
								<th>DEPARTMENT</th>
								<th>DATE</th>
								<th>TIME</th>
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
   <tr role="row" class="odd">
                                            <td class="sorting_1"> </td>
                                            <td></td>
                                            <td>&nbsp;</td>
                                            <td> </td>
                                             <td><a class="waves-effect waves-green btn-flat m-b-xs"></a>
                                                 

                                             </td>
                                              <td></td>
                                            <td>
											<a href="employeeprofile.php"><i class="material-icons">visibility</i></a>
 </a></td>
                                        </tr>
                                           
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