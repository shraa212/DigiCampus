<?php

session_start();
include '../Includes/dbcon.php';

if(isset($_GET)) {

	$sql = "DELETE FROM job_post WHERE id_jobpost='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM apply_job_post WHERE id_jobpost='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: P-ActiveJobs.php");
		exit();
	} else {
		echo "Error";
	}
}