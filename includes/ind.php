

<?php
if(isset($_POST["submit"])){

$from = $_POST['start'];
$to = $_POST['end'];
$userid = $_POST['uid'];

$sql = "SELECT * FROM attendance WHERE $from <= attendanceTime && $to >= attendanceTime && $userid=userID " 

}


