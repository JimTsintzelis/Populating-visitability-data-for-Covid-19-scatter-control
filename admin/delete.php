<?php
	session_start();
	include_once("../connect.php");
    $query = "DELETE FROM cases";
    $mysql_link->query($query);
    $query = "DELETE from types";
    $mysql_link->query($query);
    $query = "DELETE from visits";
    $mysql_link->query($query);
    $query = "DELETE from popular_times";
    $mysql_link->query($query);
    $query = "DELETE from pois";
    $mysql_link->query($query);
	$mysql_link->close();
?>