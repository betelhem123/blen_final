<?php

session_start();
session_unset();
session_destroy();

$err=$_GET["error"];
header("location: ../login.php?error=$err");
exit();