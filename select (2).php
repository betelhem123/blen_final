<?php
// require_once 'db.inc.php';
//if(isset($_GET['uid']))
// $uid=intval($_GET['uid']);
$query ="SELECT dep_id,departmentname FROM departments ";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= $result->fetch_all(MYSQLI_ASSOC);
    }