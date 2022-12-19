<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="js/register.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<?php session_start(); ?>
	</head>
	<body>
<style>
	#message{
		margin-left:0px;
		margin-top:-12px;
	}
</style>
	
	<div class="container" style="margin-top: -100px; margin-left:-170px;">
		<h2 style="color:white;"></h2>
				<form class="login" style="width:600px; height:435px; padding: 5px 30px 30px 30px;">
					<table  id="register">
						<tr>
							<td style="width:50%;">
								<label for="uname"><b>Username</b></label>
								<input type="text" placeholder="Username" id="uname" required>
							</td>
							<td style="width:50%;">
								<label for="registration"><b>Password</b></label>
								<input type="password" placeholder="Password" id="psw" required>	
							</td>
						</tr>
						<tr>
							<td>
								<label for="email"><b>E-mail</b></label> 
								<input type="email" placeholder="e-mail" id="email" />
							</td>
							<td>
								<label for="registration"><b>Password Confirmation</b></label>
								<input type="password" placeholder="Password Confirmation" id="re_psw" />
							</td>
						</tr>
						<tr>
							<td> 
								<p></p>
								<button style="margin-left:8px; margin-top:-5px;" type="button" id="register_btn">Register</button>
								
							</td>
							<td>
							<div style="margin-top:-10px;">
								 <p>Already having an account?</p>
								 <button style="margin-left:8px; margin-top:-5px;" type="button" id="login_btn" style="margin-left: -5px;" onclick="window.location='index.php'">Login</button>
							 </div>
							</td>
						</tr>		
					</table>
					<div id = "message" style="display:none;"> </div>
				</form>
					<h1 style="color:white; width: 890px; font-size: 40px; margin-left:10px; margin-top: 230px;">Populating visitability data for scatter control</h1>
		</div>
	</body>
</html>