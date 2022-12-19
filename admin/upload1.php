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
		<script src="../js/upload.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/mycss.css"/>
		<?php 
			session_start();
			if (!isset( $_SESSION['user_id'] ) && !isset( $_SESSION['user_type'])) {
				header("Location:../index.php");
			}
			else if($_SESSION['user_type'] == "user"){
				header("Location:../user/erwt2/user_erwt2.php");
			}
		?>
	</head>
	<body>
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
		<div class = "panel panel-primary">
			<div class="panel-body" style = "text-align: center">
				<form class="form-horizontal" enctype="multipart/form-data">	
						<div class="form-group">
							<input type="file" class="form-control" id="file" style="width: 75%; margin-left:75px;" name="file" accept=".json">
						</div>
						<div class= "form-group">
							<div class = "container" style="margin-top: 0px; margin-left:-65%;">
								<div class = "row">
									<button type="button" class = "btn btn-primary" id="upload_button" onclick="uploading()">Upload</button>
                                    <button type="button" class = "btn btn-primary" id="upload_button" onclick="deletion()" style="margin-left: 10px;">Delete</button>
								</div>							
							</div>
						</div>
						<div class= "form-group" id = "message" style = "display: none">
						</div>
					</form>
				
			</div>
		</div>
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>