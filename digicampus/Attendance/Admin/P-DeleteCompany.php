<?php

session_start();
include '../Includes/dbcon.php';



//require_once("db.php");

if(isset($_GET)) {

	//Delete Company using id and redirect
	$sql = "DELETE FROM company WHERE id_company='$_GET[id]'";
	if($conn->query($sql)) {
		header("Location: P-companies.php");
		exit();
	} else {
		echo "Error";
	}
}