<?php
    session_start();
    if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
        header("Location:../index.php");
    }
    else if($_SESSION['user_type'] == "user"){
        header("Location:../user/erwt2/user_erwt2.php");
    }
    header("Content-Type: application/json; charset=UTF-8");
	include_once("../connect.php");
    
    $sql =    "SELECT COUNT(*) AS num_visits, DAYOFWEEK(date_visit) as day FROM visits WHERE DATE(date_visit) BETWEEN  '".$_POST["dateFrom"]."' AND '".$_POST["dateTo"]."' GROUP BY DAYOFWEEK(date_visit)";
    $result = $mysql_link->query($sql);

    $data = [];
    while($row = $result->fetch_assoc()){

        $data[] = array("day" => $row["day"], "num" => intval($row["num_visits"]));
    }

    $sql = "SELECT COUNT(*) AS num_visits, DAYOFWEEK(date_visit) as day
            FROM visits v
            WHERE user IN (SELECT user FROM cases WHERE case_date BETWEEN date_sub(v.date_visit, INTERVAL 14 day)  AND date_add(v.date_visit, INTERVAL 7 day)) AND DATE(date_visit) BETWEEN '".$_POST["dateFrom"]."' AND '".$_POST["dateTo"]."'
            GROUP BY DAYOFWEEK(date_visit)";
    $result2 = $mysql_link->query($sql);
    $data2 = [];
    while($row2 = $result2->fetch_assoc()){
        $data2[] = array("day" => $row2["day"], "num" => intval($row2["num_visits"]));
    }
    echo json_encode(array("visits_per_day" => $data, "cases_per_day" => $data2));
?>