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
		<script src="../js/cases.js"></script>
		<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      	<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
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
.table{
	display:table !important;
	width: 50%;
}
.table th{
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: tomato;
		color: white;
	}
</style>
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
		<center>
		<div style="padding:50px">
			<table id="case_table" class="table" style = "display:none; text-align:center;"><h3>Covid cases contacts</h3></table>
		</div>
		<div class = "container" style="margin-top: -50px;">
			<form class="form-inline" style="padding:50px">
				<div class="form-group">
					<h3>Day of Covid Case:</h3><br>
					<input type="text" class="form-control" id="diagdate">
				</div>
				<br><br><button type="button" class="btn btn-primary" onclick = "subm()">Submit</button>
			</form>
		</div>
		</center>
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>