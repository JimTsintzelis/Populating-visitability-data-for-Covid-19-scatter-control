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
    
    $sql =    "SELECT p.name, p.adress, v.date_visit
               FROM visits v
               INNER JOIN pois p ON p.id = v.poi_id
               WHERE user = '".$_SESSION["user_id"]."' ORDER BY v.date_visit DESC";
    $result = $mysql_link->query($sql);
    $visits = array();
    while($row = $result->fetch_assoc()){
        $visits[] = array("name" => $row["name"], "address" => $row["adress"], "date" => $row["date_visit"]);
    }

    $sql = "SELECT case_date FROM cases WHERE user = '".$_SESSION["user_id"]."' ";
    $count = 1;
    $cases = array();
    $result = $mysql_link->query($sql);
    while($row = $result->fetch_assoc()){
        $cases[] = array("aa" => $count, "date" => $row["case_date"]);
        $count++;
    }

    
    echo json_encode(array("visits" => $visits, "cases" => $cases));
?>