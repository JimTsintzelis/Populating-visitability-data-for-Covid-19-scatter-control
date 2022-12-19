<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="js/login.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<?php session_start(); ?>
	</head>
	<body>
		<div class="container" style="margin-top: -100px; margin-left:-170px;">
			<h2 style="color:white;"></h2>	
				<form class="login" style="height:410px;" method="post">
					<label for="uname"><b>Username</b></label>
					<input type="text" placeholder="Username" id="uname" required>
					<label for="registration"><b>Password</b></label>
					<input type="password" placeholder="Password" id="psw" required>
					<button style="margin-left:8px;" type="button" id="login_btn">Login</button>
					<span class="registration">If you do not have an account please 
					<button style="margin-left:8px;" type="button"><a href="register.php">Register</a></button></span>
					
				</form>
				<div id = "message" style="display:none"></div>
			</div>
			<h1 style="color:white; width:890px; font-size: 40px; margin-left: -140px; margin-top: 260px;">Populating visitability data for scatter control</h1>

	</body>
	
</html>


