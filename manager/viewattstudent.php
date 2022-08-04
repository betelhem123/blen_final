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
                    <form action="viewattstudent.php" method="post">
                    <div class="form-group row mb-3">
                        <div class="col-xl-6">
                        <label class="form-control-label">Select Student<span class="text-danger ml-2">*</span></label>
                        <?php
                        $qry= "SELECT * FROM tblstudents where classId = '$_SESSION[classId]' and classArmId = '$_SESSION[classArmId]' ORDER BY firstName ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="admissionNumber" class="form-control mb-3">';
                          echo'<option value="">--Select Student--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['admissionNumber'].'" >'.$rows['firstName'].' '.$rows['lastName'].'</option>';
                              }
                                  echo '</select>';
                              }
                            ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Type<span class="text-danger ml-2">*</span></label>
                          <select required name="type" onchange="typeDropDown(this.value)" class="form-control mb-3">
                          <option value="">--Select--</option>
                          <option value="1" >All</option>
                          <option value="2" >By Single Date</option>
                          <option value="3" >By Date Range</option>
                        </select>
                        </div>
                    </div>
                      <?php
                        echo"<div id='txtHint'></div>";
                      ?>
            <button type="submit" name="view" class="btn btn-primary btn-fill btn-block">Show</button>
												</form>
          </div>
        </div>
				<div class="pb-20">
				<div id="example_wrapper" class="dataTables_wrapper no-footer">
																	<div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="browser-default">
																		<option value="10">10</option>
																		<option value="25">25</option>
																		<option value="50">50</option>
																		<option value="100">100</option></select></label></div>
																		
																		
																		<div id="example_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search records" aria-controls="example"></label>
																		
																	</div>
																	
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">#</th>
								<th>FULL NAME</th>
								<th>USER ID</th>
								<th>DEPARTMENT</th>
								<th>STATUS</th>
								
								<th class="datatable-nosort">ACTION</th>
							</tr>
						</thead>
						<tbody>
				<?php
				require_once '../includes/db.inc.php';

					if(isset($_POST['view'])){

					$dateTaken =  $_POST['dateTaken'];

					// $sql = "SELECT attendance.id,attendance.att_Status,attendance.attendanceTime,departments.departmentname,
					// employee.f_ame,employee.l_name,employee.userId,
					// FROM attendance
					// INNER JOIN departments ON departments.dep_id = attendance.dep_id
					// INNER JOIN employee ON tblstemployee.userID = attendance.userID
					// where attendance.attendanceTime = '$dateTaken' and attendance.dep_id = '$_SESSION[dep_id]' ";
					// echo($dateTaken);
					$sql = "SELECT attendance.id,attendance.att_Status,departments.departmentname,attendance.attendanceTime,departments.departmentname, employee.f_name,employee.l_name,employee.userId FROM attendance INNER JOIN departments ON departments.dep_id = attendance.dep_id INNER JOIN employee ON employee.userID = attendance.userID where Date(attendance.attendanceTime) = Date('".$dateTaken."');";
						$result = $conn->query($sql);
						$num = $result->num_rows;
						// echo ($num);
						$cnt=0;
						$status="";
						if($num > 0)
                      { 
                        while ($rows = $result->fetch_assoc())
                          {
							//   echo("row will be printed");
							if($rows['att_Status'] == 'present'){
								$status = "Present"; $colour="#00FF00";
							}
							elseif($rows['att_Status'] == 'late'){
								$status = "late";$colour="#FF0000";
							}
							else{
								$status = "acclate";$colour="#0000FF";
							}
							$cnt = $cnt+1;
							echo("
							<tr>
									<td>" . $cnt."</td>
									<td>" . $rows['f_name']."".$rows['l_name']."</td>
									<td>" . $rows['userID']."</td>
									<td>" . $rows['dep_id']."</td>
									<td style='background-color:".$colour."'>".$status."</td>
								</tr>");
						}
					}
					else
					{
						echo   
                           "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
					}
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