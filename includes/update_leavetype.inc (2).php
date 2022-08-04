<?php
    session_start();
    error_reporting(0);
    require_once 'db.inc.php';
    if(strlen($_SESSION['manlogin'])==0){   
    header('location: ../login.php');
   } else {
    $upd=intval($_GET['upd']);
   
    if(isset($_POST['submit'])){

    $leavetype=$_POST['leavetype'];
    $description=$_POST['description']; 
        
    require_once 'db.inc.php';

    $sql="UPDATE leave_types SET category=?,description=? WHERE lt_id=?";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param('ssi',$leavetype,$description,$upd);
    $stmt->execute();

    $msg="leavetype updated Successfully";
    echo($msg);
    
    }
    
?>
<?php } ?>