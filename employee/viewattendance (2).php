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
			<li  class="active">
				<a href="viewattendance.php">
					<i class=' bx bx bxs-user-check icon ' ></i>
					<span class="text">View attendace</span>
				</a>
			</li>
			<li >
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
					<td>
						<h2 >ALL EMPLOYEES</h2>
					</td>
					<form action="viewattendance.php" method="post">
					<div class="row">
          <!-- <div class="col-4">
			<lable for="start date">From</lable>
            <input type="date" name="start" class="form-control" placeholder="From">
          </div> -->
          <div class="col-4">
		  <lable for="date">To</lable>
            <input type="date" name="dateTaken" id="date" class="form-control" required="True">
          </div>
		  <div class="col-4">
		  <lable for="date2">To</lable>
            <input type="date" name="dateTaken2" id="date2" class="form-control" required="True">
          </div>
		  
          <div class="col-3">
            <button type="submit" name="view" class="btn btn-primary btn-fill btn-block">Show</button>
												</form>
          </div>
        </div>
				<div class="pb-20">
				
																	
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">#</th>
								<th>FULL NAME</th>
								<th>USER ID</th>
								<th>DEPARTMENT</th>
								<th>STATUS</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
				<?php
				require_once '../includes/db.inc.php';

					if(isset($_POST['view'])){

					$dateTaken =  $_POST['dateTaken'];
					$dateTaken2 =  $_POST['dateTaken2'];
					$selected_emp =  $_POST['employee'];
					$view_all = False;
					if(!empty($_POST['view_all']))
					{
						$view_all=True;
					}

                    $emp_query ="SELECT * FROM employee ";
					$emp_result = $conn->query($emp_query);
					$emp_options= $emp_result->fetch_all(MYSQLI_ASSOC);
					$emp_num = $emp_result->num_rows;
					// echo($emp_num);
                    $start_date = $dateTaken;
                    $end_date = $dateTaken2;

					$selected_emp = $_SESSION['stflogin'];
                    
					
					$cnt=1;
						while (strtotime($start_date) <= strtotime($end_date)) {
							// echo("current emp is ".$emp['f_name'].'\n');
							// echo("in the emp loop");
                                // echo "$start_date";
                                $filter_sql = "SELECT attendance.id,attendance.att_Status,departments.departmentname,attendance.attendanceTime,departments.departmentname, employee.f_name,employee.l_name,employee.userID 
                                            FROM attendance INNER JOIN departments ON departments.dep_id = attendance.dep_id 
                                            INNER JOIN employee ON employee.userID = attendance.userID 
                                            where Date(attendance.attendanceTime) = Date('".$start_date."') and attendance.userID='".$selected_emp."';";
                                $filter_result = $conn->query($filter_sql);
                                $filter_num = $filter_result->num_rows;
								// echo($emp['userID'].'\n');
								// echo($filter_num.'\n');

                                // echo ($num);
                                $status="";
                                if($filter_num>0)
                                {
                                    while ($rows = $filter_result->fetch_assoc())
										{
										//   echo("row will be printed");
										if($rows['att_Status'] == 'present'){
											$status = "Present"; $colour="#00FF00";
										}
										elseif($rows['att_Status'] == 'late'){
											$status = "late";$colour="#FFFF00";
										}
										else{
											$status = "acclate";$colour="#FFA500";
										}
										// $cnt = $cnt+1;
										echo("
										<tr>
												<td>" . $cnt."</td>
												<td>" . $rows['f_name']." ".$rows['l_name']."</td>
												<td>" . $rows['userID']."</td>
												<td>" . $rows['departmentname']."</td>
												<td style='background-color:".$colour."'>".$status."</td>
												<td>".$start_date."</td>
												
											</tr>");
									}
                                }
                                else
                                {
									$query ="SELECT * FROM employee where userID='".$_SESSION["stflogin"]."'";
									$result = $conn->query($query);
									if($result->num_rows> 0){
									$options= $result->fetch_all(MYSQLI_ASSOC);
									// $cnt = $cnt+1;

									foreach($options as $emp){
										echo("
											<tr>
											<td>" . $cnt."</td>
											<td>" . $emp['f_name']." ".$emp['l_name']."</td>
											<td>" . $emp['userID']."</td>
											<td>" . $emp['dep_id']."</td>
											<td style='background-color:red'>Absent</td>
											<td>".$start_date."</td>
											
											</tr>");
									}
									}
                              	}
							
							$start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
							$cnt = $cnt+1;

                        }
					
                

					// $sql = "SELECT attendance.id,attendance.att_Status,attendance.attendanceTime,departments.departmentname,
					// employee.f_ame,employee.l_name,employee.userId,
					// FROM attendance
					// INNER JOIN departments ON departments.dep_id = attendance.dep_id
					// INNER JOIN employee ON tblstemployee.userID = attendance.userID
					// where attendance.attendanceTime = '$dateTaken' and attendance.dep_id = '$_SESSION[dep_id]' ";
					// echo($dateTaken);
					// $sql = "";
					// if(!$view_all)
					// {$sql = "SELECT attendance.id,attendance.att_Status,departments.departmentname,attendance.attendanceTime,departments.departmentname, employee.f_name,employee.l_name,employee.userId 
					// 	FROM attendance INNER JOIN departments ON departments.dep_id = attendance.dep_id 
					// 	INNER JOIN employee ON employee.userID = attendance.userID 
					// 	where Date(attendance.attendanceTime) >= Date('".$dateTaken."') and Date(attendance.attendanceTime) <= Date('".$dateTaken2."') and attendance.userID='".$selected_emp."';";
					// 	}
					// 	else
					// 	{
					// 		$sql = "SELECT attendance.id,attendance.att_Status,departments.departmentname,attendance.attendanceTime,departments.departmentname, employee.f_name,employee.l_name,employee.userId 
					// FROM attendance INNER JOIN departments ON departments.dep_id = attendance.dep_id 
					// INNER JOIN employee ON employee.userID = attendance.userID 
					// where Date(attendance.attendanceTime) >= Date('".$dateTaken."') and Date(attendance.attendanceTime) <= Date('".$dateTaken2."');";
					// 	}
					// 	$result = $conn->query($sql);
					// 	$num = $result->num_rows;
					// 	// echo ($num);
					// 	$cnt=0;
					// 	$status="";
					// 	if($num > 0)
                    //   { 
                    //     while ($rows = $result->fetch_assoc())
                    //       {
					// 		//   echo("row will be printed");
					// 		if($rows['att_Status'] == 'present'){
					// 			$status = "Present"; $colour="#00FF00";
					// 		}
					// 		elseif($rows['att_Status'] == 'late'){
					// 			$status = "late";$colour="#FF0000";
					// 		}
					// 		else{
					// 			$status = "acclate";$colour="#0000FF";
					// 		}
					// 		$cnt = $cnt+1;
					// 		echo("
					// 		<tr>
					// 				<td>" . $cnt."</td>
					// 				<td>" . $rows['f_name']."".$rows['l_name']."</td>
					// 				<td>" . $rows['userID']."</td>
					// 				<td>" . $rows['dep_id']."</td>
					// 				<td style='background-color:".$colour."'>".$status."</td>
					// 			</tr>");
					// 	}




















					
				}
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
<?php } ?>