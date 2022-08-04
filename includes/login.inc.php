<?php 

if(isset($_POST["submit"])){

    $userID = $_POST["userID"];
    $pwd = $_POST["password"];
    //$position = $_POST["position"];
    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    
  if (emptyLoginInput($userID,$pwd)!==false){
  header("location: ../login.php?error=emptyinput");
        exit();
      }
      
  loginUser($conn, $userID, $pwd);
  
}
else {
  header("location: ../login.php?");
  exit();
}