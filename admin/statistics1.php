<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="../js/statistics.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<?php 
			session_start();
			if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
				header("Location:../../index.php");
			}
			else if($_SESSION['user_type'] == "user"){
				header("Location:../../user/erwt2/user_erwt2.php");
			}
		?>
	</head>
	<body>
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
		
		
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 35%;
  margin-left: 30%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: tomato;
  color: white;
  width:50%;
}
</style>
<br></br>
<table id="customers">
  <tr>
     <th>Number of recorded visits:</th>
     <td align=center> <h3 id = "tot_vis"></h3></td>
  </tr>
  <tr>
     <th>Number of reported Covid cases:</th>
     <td align=center><h3 id = "tot_cases"> </h3></td>
  </tr>
  <tr>
     <th>Number of visits by Covid cases:</th>
     <td align=center><h3 id = "vis_cases"></td>
  </tr>
</table>
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>