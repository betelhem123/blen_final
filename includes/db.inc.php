<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "blendb";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
 
if ($conn -> connect_error) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
     
  }
  //echo "connection successfulfffffffffff";