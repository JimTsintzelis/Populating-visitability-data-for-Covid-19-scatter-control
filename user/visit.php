<?php
    session_start();
    if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
		header("Location:../index.php");
	}
	else if($_SESSION['user_type'] == "admin"){
		header("Location:../admin/statistics1.php");
	}
	include_once("../connect.php");
    $ektimisi = empty($_POST["ektimisi"]) ? "NULL" : $_POST["ektimisi"];
    $sql = "INSERT INTO visits(user, poi_id, date_visit, visit_estimation) VALUES('".$_SESSION['user_id'] ."', '".$_POST["id"]."', '".date('Y-m-d H:i:s')."',".$ektimisi.") ";
    $result = $mysql_link->query($sql);
    echo $result;
?>