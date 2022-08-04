<?php
   session_start();
   error_reporting(0);
   require_once 'db.inc.php';
   if(strlen($_SESSION['manlogin'])==0){   
   header('location: ../login.php');
  } else {
    $uid=intval($_GET['uid']);
    //echo ( $uid);
    if(isset($_POST['submit'])){

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $phonenumber = $_POST["phonenumber"];
        $adress = $_POST["adress"];
        $position = $_POST["position"];
        $email = $_POST["email"];
        $Dep = $_POST["Department"];
        $leave_date = $_POST["leave_date"];
        // echo ($leave_date);

        require_once 'db.inc.php';

    $sql="UPDATE employee SET f_name=?,l_name=?,email=?,adress=?,gender=?,position=?,dob=?,dep_id=?,phone=?,available_leave_date=? WHERE emp_id=?";
    $stmt = $conn -> prepare($sql);
    // echo("errro");
    $stmt -> bind_param('sssssssssii',$firstname,$lastname,$email,$adress,$gender,$position,$dob,$Dep,$phonenumber,$leave_date,$uid);
    $stmt->execute();

    $msg="Employee record updated Successfully";
    echo($msg);
    header("location: ../manager/employeeprofile.php");
    }
?>
    <?php } ?>