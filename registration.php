<?php
	session_start();
	include_once("connect.php");
	
	$query = "SELECT *
			  FROM users
			  WHERE username = '".$_POST["username"]."' OR email = '".$_POST["email"]."'";
	$result = $mysql_link->query($query);
	if (mysqli_num_rows($result) == 0) { 
		$ins_query = "INSERT INTO users 
					  (username, password, email)
					  VALUES('".$_POST["username"]."','".$_POST["password"]."', '".$_POST["email"]."')";
		$mysql_link->query($ins_query);
		$mysql_link->close();
		echo 1;
	}
	else{	
		echo 0;
		$mysql_link->close();
	}
?>