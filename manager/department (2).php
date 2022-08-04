<?php
     session_start();
     error_reporting(0);
     require_once '../includes/db.inc.php';
     if(strlen($_SESSION['manlogin'])==0){   
     header('location:../login.php');
    } else { 
        require_once '../includes/db.inc.php';
		//require_once '../include/db.inc.php';
    if(isset($_GET['del']))
    {
    $id=$_GET['del'];
    $sql = "DELETE from  departments  WHERE dep_id=?";
    $query = $conn->prepare($sql);
    $query -> bind_param('i',$id);
    $query -> execute();
    $msg="The selected department has been deleted";

    }
    if(isset($_POST['submit'])){

    $depname=$_POST['departmentname'];
    $code=$_POST['code'];   
    $sql="INSERT INTO departments(departmentname,departmentCode) VALUES(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss',$depname,$code);
    $stmt->execute();
    $lastInsertId = $conn->insert_id;

    if($lastInsertId){
    $msg="Department Created Successfully";
    } else {
    $error="Something went wrong. Please try again";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/back.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/department.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">

	<title>DEPARTMENTS</title>
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
			<li  >
				<a href="department.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Department</span>
				</a>
			</li>
			<li >
				<a href="new_leave.php">
					<i class=' bx bxs-group ' ></i>
					<span class="text">Leave Type </span>
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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/10.gif" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 ">Departments</div>
						</h4>
					</div>
				</div>
			</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">New Department</h2>
								<section>
									<form action="department.php" method="POST">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Department Name</label>
												<input name="departmentname" type="text" class="form-control" required="true" autocomplete="off">
											</div>
											<div class="form-group">
												<label>Department Code</label>
												<input name="code" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
</div>
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary" type="submit" value="Create" name="submit" id="add">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Department List</h2>
								<div class="pb-20">
									<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div>
									<div class="col-sm-12 col-md-6"></div></div><div class="row">
										<div class="col-sm-12"><table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid">
										<thead>
										<tr role="row">
										<th  rowspan="1" colspan="1" >#</th>
										<th  rowspan="1" colspan="1" >ID</th>
										<th  rowspan="1" colspan="1" >DEPARTMENT</th>
										<th  rowspan="1" colspan="1" >Code</th>
										<th  rowspan="1" colspan="1" >CREATION DATE</th>
										<th  rowspan="1" colspan="1" >ACTION</th>
										</tr>
										</thead>
										</tbody>
										<?php
												require_once '../includes/db.inc.php';

												$sql = "SELECT * FROM  departments";
												$result = $conn->query($sql);
												$rowCount = $result->num_rows;
												$cnt=1;
												//$conn->close();
												if($rowCount>0){
												while($rows=$result->fetch_assoc())
												{
											?>
											
											<tr>
												<!-- FETCHING DATA FROM EACH
													ROW OF EVERY COLUMN -->
												
												<td><?php echo ($cnt);?></td>
												<td><?php echo $rows['dep_id'];?></td>
												<td><?php echo $rows['departmentname'];?></td>
												<td><?php echo $rows['departmentcode'];?></td>
												<td><?php echo $rows['creationdate'];?></td>
												<td>
												<input type="button" onClick="location.href='update_department.php?upd=<?php echo $rows['dep_id'];?>'" , value='Update'/>
												<input type="button" onClick="location.href='department.php?del=<?php echo $rows['dep_id'];?>'" , value='Delete'/>
											</td>                                             
												<?php
											$cnt++; }}
											?>
										</tbody>
												</table>
										
								</ul></div></div></div></div>
								</div>
							</div>
						</div>
		
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/adminjs.js"></script>
	<?php include('scripts.php')?>

</body>
</html>
<?php } ?>