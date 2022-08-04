<?php 

if(isset($_POST["submit"])){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $phonenumber = $_POST["phonenumber"];
    $adress = $_POST["adress"];
    $gender = $_POST["gender"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $userID = $_POST["userID"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordrepeat"];
    $Dep = $_POST["Department"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

  if (emptyAdduserInput($firstname,$lastname,$dob,$phonenumber,$adress,$gender,
                        $position,$email,$userID,$pwd,$pwdRepeat,$Dep)!==false){
                            header("location: ../manager/add_employee.php?error=emptyinput");
                            exit();
                        }
  if (invalidUserID($userID)!==false){
                            header("location: ../manager/add_employee.php?error=invalidusername");
                            exit();
                        }
  if (invalidEmail($email)!==false){
                            header("location: ../manager/add_employee.php?error=invalidemail");
                            exit();
                        }
  if (pwdMatch($pwd,$pwdRepeat)!==false){
                            header("location: ../manager/add_employee.php?error=pwddontmatch");
                            exit();
                        }
  if (userIdExists($conn,$userID,$email)!==false){
                            header("location: ../manager/add_employee.php?error=usernametaken");
                            exit();
                        }
  createUser($conn,$firstname,$lastname,$userID,$pwd,$email,$dob
  ,$phonenumber,$adress,$gender,$position,$Dep);
    
    }
    else
    {
        header("location: ../manager/add_employee.php");
    }

