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
    $sql = "SELECT *
            FROM types";
    $result = $mysql_link->query($sql);
    $data = array();
    while($row = $result->fetch_assoc()){
        if($row["type"] != "establishment" && $row["type"] != "point_of_interest"){

            $data[] = $row["type"];
        }
    }
    echo json_encode($data);
?>