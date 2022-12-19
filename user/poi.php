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
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>
		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
		<script src="../js/poi.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
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
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
		<style>
		.form-control{
			width: 200px;
		}
		#search{
			width:200px;
		}
		#info td{
			padding: 0px 7px !important;
		}
		.leaflet-popup-content{
			width:auto !important;
		}
		#ektimisi::-webkit-inner-spin-button {
			-webkit-appearance: none;
		}
		</style>
			<center>
		<div class = "container">
			<div class = "row">
				<div id = "map" style="width:850px; height: 600px; display: inline-block"></div>
				<div class = "col-lg-8">
						
					<div class = "form-group">
						<select class="form-control" id = "types" style="margin-left: 390px;margin-top: 50px;" disabled>
						</select>
					</div>
					
				</div>
			</div>

			<div id = "map_container" style = "text-align: center" class = "col-lg-8"></div>		
		
		</div>
		</div>
	
			<div class = "form-group">
				<button class = "btn btn-block btn-primary" id = "search" disabled>Search</button>
			</div>
		</center>	
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>