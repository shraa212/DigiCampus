<?php

session_start();
include '../Includes/dbcon.php';

//require_once("db.php");

if (isset($_GET)) {

    //Delete student using id and redirect
    $sql = "DELETE FROM registercandidate WHERE id='$_GET[id]'";
    if ($conn->query($sql)) {
        header("Location: P-Application.php");
        exit();
    } else {
        echo "Error";
    }
}
