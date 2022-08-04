<?php
    session_start();
    error_reporting(0);
    require_once 'db.inc.php';
    if(strlen($_SESSION["manlogin"])==0){   
    header('location: ../login.php');
   } else {
    $upd=intval($_GET['upd']);
    if(isset($_POST['submit'])){

        $depname = $_POST["departmentname"];
        $code = $_POST["code"];
        
        require_once 'db.inc.php';

    $sql="UPDATE departments SET departmentname=?,departmentcode=? WHERE dep_id=?";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param('ssi',$depname,$code,$upd);
    $stmt->execute();
    header("location: ../manager/department.php");
    $msg="Department updated Successfully";
    echo($msg);
    }
?>
    <?php } ?>