<?php
    session_start();
    if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
		header("Location:../index.php");
	}
	else if($_SESSION['user_type'] == "admin"){
		header("Location:../admin/statistics1.php");
	}
	header("Content-Type: application/json; charset=UTF-8");
	include_once("../connect.php");
    $sql = "UPDATE users SET password = '".$_POST['password']."' WHERE username = '".$_SESSION['user_id']."'";
    $result = $mysql_link->query($sql);
	echo 1;
?>