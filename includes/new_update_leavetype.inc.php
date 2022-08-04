<?php
    session_start();
    error_reporting(0);
    require_once 'db.inc.php';
    if(strlen($_SESSION["manlogin"])==0){   
    header('location: ../login.php');
   } else {
    $upd=intval($_GET['upd']);
    if(isset($_POST['submit'])){

        $leavetype = $_POST["leavetype"];
        $desc = $_POST["desc"];
        
        require_once 'db.inc.php';

    $sql="UPDATE leave_types SET category=?,description=? WHERE lt_id=?";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param('ssi',$leavetype,$desc,$upd);
    $stmt->execute();
    header("location: ../manager/new_leave.php");
    $msg="Leave Type updated Successfully";
    echo($msg);
    }
?>
    <?php } ?>