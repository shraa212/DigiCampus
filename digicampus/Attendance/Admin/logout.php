<?php
session_start(); 
include "../Includes/dbcon.php";
$id=$_SESSION['userId'];
$query = "UPDATE tbladmin set otp='NOT DEFINED' where Id='$id'";
$rs = $conn->query($query); 
session_destroy(); // destroy session
  echo "<script type = \"text/javascript\">
  window.location = (\"../index.php\");
  </script>";
  
  ?>

