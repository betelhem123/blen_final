<?php
    session_start();
    error_reporting(0);
    require_once '../includes/db.inc.php';
    if(strlen($_SESSION['stflogin'] )==0){   
    header('location:../login.php');
   } else {
    require_once '../includes/functions.inc.php';
	require_once '../includes/db.inc.php';
    $userID=$_SESSION["staffid"];
    $sql = "SELECT * FROM employee WHERE emp_id =".$userID;
            $stmt = $conn->query($sql);
            $row = $stmt->fetch_assoc();
               
                    
    if(isset($_POST['change']))
        {
    $currentpwddb=$row['password'];
    $existingpwd=md5($_POST['existingpwd']);
    if($_POST['newpwd']!=$_POST['confirmpassword']){
       // echo ("Password does not match !");
		header("location: change_password.php?error=confirmfail");
        exist();
    }
    else if($currentpwddb!=$existingpwd){
       // echo("current password is wrong!");
		header("location: change_password.php?error=currentfail");
        exist();
    }else{

    $newpassword=md5($_POST['newpwd']);
    $userID=$_SESSION['stflogin'];
    $con="UPDATE employee set password=? where userID=?";
    $chngpwd1 =  $conn->prepare($con);
    $chngpwd1 -> bind_param('ss', $newpassword,$userID);
    $chngpwd1 -> execute();
    //$msg="Your Password Has Been Updated.";
    //echo($msg);
    header("location:../employee/logout.php?error=successful");
        }   

}
?>
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
		
			<li >
				<a href="request.php">
					<i class='bx bx-calendar icon'></i>
					<span class="text">Request Leave</span>
				</a>
			</li>
		
			<li class="active">
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
			<!-- NAVBAR -->

	<section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4 user-icon">
						<img src="image/10.gif" alt="">
					</div>
					<div class="col-md-8">

						
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							 <div class="weight-600 font-30 ">Change Password</div>
						</h4>
					</div>
				</div>
			</div>
		<!-- top box-->

		<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4">Change Password</h2>
								<section>
		
<form name="change pwd", method="POST">
<div class="row">
	<div class="col-md-12">
		<div class="form-group">

            <div>
                <label for="existingpwd" >Existing Password</label>
                <input type="password" name="existingpwd"  class="form-control"id="existingpwd" placeholder="******" required>
            </div>
            <div>
                <label for="newpwd">New Password</label>
                <input type="password" class="form-control" name="newpwd" id="newpwd" placeholder="******"  required>
            </div>
            <div>
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="******"   required>
            </div>
     

 
            <button class="btn btn-primary" name="change" type="submit" onclick="return valid();">CHANGE PASSWORD</button>
             </form>
			 <br>
			 <br>
			 <?php
                              
                              if(isset($_GET["error"])){
                                  if($_GET["error"] == "confirmfail"){
                                      echo "<p>Password does not match !</p>";
                                  }
                                  elseif($_GET["error"] == "currentfail"){
                                      echo "<p>current password is wrong!</p>";
                                  }
                                 
                              }
                              
                                    ?>
					

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script src="js/adminjs.js"></script>
</body>
</html>
<?php }?>