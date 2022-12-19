<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="../js/account.js"></script>
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
	label{
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: center;
		background-color: tomato;
		color: white;
		width: 250px;	
	}
	.form-control{
		width: 250px;
	}
	#change_btn{
		background-color: darkcyan !important;
		border-color: darkcyan !important;
		color: white;
	}
	.tab-content{
	    margin-left: 42%;
		margin-top: 50px;	
	}
</style>	
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>

			<div class = "tab-content">
				<div id = "menu2" style ="margin: 50px">
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" disabled>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password</label>
                            <input type="text" class="form-control" id="pwd">
                        </div>
						<script type="text/javascript">
							$(window).on('load', showData());
						</script>
                        <button type="button" id="change_btn" class="btn btn-default"  onclick="newpass()">Change Password</button>
                    </form>
				</div>
			</div>
			<div class= "form-group" id = "message" style = "display: none">
		</div>
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>