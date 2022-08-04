<?php

function emptyAdduserInput($firstname,$lastname,$dob,$phonenumber,$adress,$gender,
                        $position,$email,$userID,$pwd,$pwdRepeat,$Dep){
            $result;
            if(empty($firstname)||empty($lastname)||empty($dob)||empty($phonenumber)||empty($adress)||empty($gender)||
                empty($position)||empty($email)||empty($userID)||empty($pwd)||empty($pwdRepeat)||empty($Dep)){
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;                
                        }
function invalidUserID($userID){
            $result;
            if(!preg_match("/^[a-zA-Z0-9]*$/", $userID)){
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;                
                        }
function invalidEmail($email){
            $result;
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;                
                        }
function pwdMatch($pwd,$pwdRepeat){
            $result;
            if($pwd !== $pwdRepeat){
                $result = true;
            }
            else{
                $result = false;
            }
            return $result;                
                        }

function userIdExists($conn,$userID,$email){
            $sql = "SELECT * FROM employee WHERE userID = ? OR email = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                header("location: ../add_employee.php?error=stmtfaild");
                exit();
            } 
            
            $stmt-> bind_param("ss",$userID,$email);
            $stmt-> execute();
            $result = $stmt->get_result();

            if($row = $result->fetch_assoc()){
                return $row;
            }
            else {
                $result = false;
                return $result;
            }
            $stmt-> close();
                        } 
                       
function createUser($conn,$firstname,$lastname,$userID,$pwd,$email,$dob
                   ,$phonenumber,$adress,$gender,$position,$Dep){
            $sql = "INSERT INTO `employee`(`f_name`, `l_name`, `userID`, `password`, `email`,`registered_date`,
                        `dob`, `phone`, `adress`, `gender`, `position`, `dep_id`) VALUES
                        (?,?,?,?,?,current_timestamp(),?,?,?,?,?,?)" ;
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                header("location: ../manager/add_employee.php?error=stmtfaild");
                exit();
            } 
            //$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $hashedpwd=md5($pwd);
            $stmt-> bind_param("sssssssssss",
                                $firstname,$lastname,$userID,$hashedpwd,$email,$dob
                                ,$phonenumber,$adress,$gender,$position,$Dep);
            $stmt-> execute();
            $stmt-> close();
            header("location: ../manager/add_employee.php?error=none");
            
                        }

function emptyLoginInput($userID,$pwd){
    $result;
    if(empty($userID)||empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $userID, $pwd)
{
    $userexist = userIdExists($conn,$userID,$userID); 

    if($userexist === false){
        header("location: ../login.php?error=wronglogin");
        exist();
    }
    $pwdhashed = $userexist["password"]; 
    //$checkpwd = password_verify($pwd,$pwdhashed);
    $hashedpwd=md5($pwd);
    $checkpwd = $pwdhashed == $hashedpwd;
    echo($pwdhashed);
    echo($hashedpwd );
    if($checkpwd === false){

        header("location: ../login.php?error=cpw"."_".$hashedpwd."_".$pwdhashed."_".$pwd);
        exit();
    }
    elseif($userexist['Status'] == 0){
        header("location: ../login.php?error=inactive");
        exit();  
    }
    else if($checkpwd === true && $userexist['position']== "manager"){
        session_start();
        $_SESSION["manid"]= $userexist["emp_id"];
        $_SESSION["manlogin"]= $userexist["userID"];
        $_SESSION["manposition"]= $userexist["position"];
        $_SESSION["man_name"]= $userexist["f_name"." "."l_name"];
    
        header("location: ../manager/index.php");      
    }
    elseif($checkpwd === true && $userexist['position']== "humanresource"){
        session_start();
        $_SESSION["hrid"]= $userexist["emp_id"];
        $_SESSION["hrlogin"]= $userexist["userID"];  // remember fetch_assoc inside userexist function
        $_SESSION["hrposition"]= $userexist["position"];
        $_SESSION["hr_name"]= $userexist["f_name"." "."l_name"];

        header("location: ../hr/index.php");
    }
    elseif($checkpwd === true && $userexist['position']== "staff"){
        session_start();
        $_SESSION["staffid"]= $userexist["emp_id"];
        $_SESSION["stflogin"]= $userexist["userID"];  
        $_SESSION["stfposition"]= $userexist["position"];
        $_SESSION["staff_name"]= $userexist["f_name"." "."l_name"];
        
        header("location: ../employee/index.php");
    }
}
 