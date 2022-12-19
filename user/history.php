<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="../js/history.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link>
		<?php 
			session_start();
			if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
				header("Location:../index.php");
			}
			else if($_SESSION['user_type'] == "admin"){
				header("Location:../admin/statistics1.php");
			}
		?>
	</head>
	<body>
	
<style>
	#cases_table{
		margin-left: 100px;
	}	
	
	#cases_table th{
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: tomato;
		color: white;
		width: 50%;	
	}
	#cases_table td{
		text-align: center;	
	}
	#h3_cases_table{
		margin-left:190px;
	}
	#visits_table{
		margin-left: -190px;
	}	
	#visits_table th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: tomato;
		color: white;
		width: 300px;
	}
	#visits_table td{
		text-align: center;	
	}
	#h3_visits_table{
		margin-left:190px;
	}
</style>
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
			
			<div class = "tab-content">
				<div id = "menu1" class="tab-pane fade in active" style ="margin: 50px; ">
					<div style="margin-left: 650px;">
					
						<table id="cases_table" class="table" style = "display:none;"><h3 id="h3_cases_table">Covid Cases</h3></table>
					<br>
						<table id="visits_table" class="table" style = "display:none;"><h3 id="h3_visits_table">History Visits</h3></table>
					</div>
				</div>
		</div>
		
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>