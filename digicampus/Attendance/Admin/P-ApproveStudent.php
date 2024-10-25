<?php

session_start();

include '../Includes/dbcon.php';
if (isset($_GET)) {


    $sql = "UPDATE registercandidate SET active='1' WHERE id='$_GET[id]'";
    if ($conn->query($sql)) {
        header("Location: P-Application.php");
        exit();
    } else {
        echo "Error";
    }
}
