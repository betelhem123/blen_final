<?php
    session_start();
    error_reporting(0);
    require_once '../include/db.inc.php';
    if(strlen($_SESSION['manlogin'])==0){   
   header('location:../login.php');
   } else { 
    echo ("Welcome manager!");
 ?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

<header>

  <h1>Attendance</h1>
  

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Individual Report</h3>

    <form method="post" action="">


      <p>  </p>
      <label>Employee User ID</label>
      <input type="text" name="userid">
      <input type="submit" name="userid" value="Go!" >

    </form>

    <h3>Mass Report</h3>

    <form method="post" action="">

    <label>Select Depatment</label>
    <?php
        require_once '../include/db.inc.php';
        require_once '../select.php';
        ?>
        <select name="Department">
        <option>Select Department</option>
        <?php 
        foreach ($options as $option) {
        ?>
        <option><?php echo $option['departmentname']; ?> </option>
        <?php 
        }
   ?>
    <p>  </p>
      <label>Date ( yyyy-mm-dd )</label>
      <input type="text" name="date">
      <input type="submit" name="mass" value="Go!" >
    </form>

    <br>

    <br>

   <?php

    if(isset($_POST['userid'])){

     $userid = $_POST['userid'];

     $sql = $conn -> query("SELECT userID,count(*) as countp from attendance WHERE attendance.userID='$userid' and attendance.att_Status='present'");
    // $single = mysql_query("select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
    $sqlt = $conn -> ("SELECT count(*) as countT from attendance WHERE attendance.userID='$userid'")
       // $singleT= mysql_query("select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
    //  $count_tot = mysql_num_rows($singleT);
  } 

    if(isset($_POST['mass'])){

     $sdate = $_POST['date'];
     $dep = $_POST['Department'];

    // $sqll = mysql_query("select * from attendance where reports.stat_date='$sdate' and reports.course = '$course'");
     $sqll = $conn -> query("SELECT * from attendance WHERE reports.attendanceTime='$sdate' and reports.department ='$dep' ");
    }
    if(isset($_POST['mass'])){

      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">UserID</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Date</th>
          <th scope="col">Attendance Status</th>
        </tr>
     </thead>


    <?php

     $i=0;
     while ($data = mysql_fetch_array($sqll)) {

       $i++;

     ?>
        <tbody>
           <tr>
             <td><?php echo $data['userID']; ?></td>
             <td><?php echo $data['name']; ?></td>
             <td><?php echo $data['department']; ?></td>
             <td><?php echo $data['att_status']; ?></td>
             
           </tr>
        </tbody>

     <?php 
   } 
  }
     ?>
     
    </table>


    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

    <?php


    if(isset($_POST['userid'])){

       $count_pre = 0;
       $i= 0;
       $count_tot;
       if ($row=mysql_fetch_row($sqlt))
       {
       $count_tot=$row[0];
       }
       while ($data = mysql_fetch_array($sql)) {
       $i++;
       
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Student Reg. No: </td>
          <td><?php echo $data['userid']; ?></td>
      </tr>

           <?php
         //}
        
        // }

      ?>
      
      <tr>
        <td>Total office (Days): </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent (Days): </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>

  </div>

</div>

</center>

</body>
</html>
<? } ?>