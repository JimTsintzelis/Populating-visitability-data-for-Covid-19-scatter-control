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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css"></link>
		<script src="../js/dayvisits.js"></script>
		<script src="../js/logout.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		
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
	<style>
		#chart_container {
			width: 800px;
			height: 600px;
			margin-left: 27%;
		}
	</style>
		<?php
			include_once("../header.php");
			include_once("menu.php");
		?>
		<form  id = "search_form" style = "margin:50px">
            <div class = "container">
                <center>
				<div class = "row">
                    <center>
					<div class = "col-lg-3" style="width:18%; margin-left:485px;">
                        <div class = "form-group">
                            <label class = "control-label">From</label> 
                            <input class="form-control" type="text" id="datepickerFrom">
						</div>
						<div class = "form-group">
							<label class = "control-label">To</label> 
                            <input class="form-control" type="text" id="datepickerTo">
						</div>
					</div>
					</center>
                </div>
				
				<div class = "form-group">
							<button class = "btn btn-block btn-primary" id = "search" style="width:9%;">Search</button>
				</div>
				</center>		
				
                <div class = "row">
                    <div class ="col-lg-9 col-lg-offset-3" style="margin-left: 425px;">
                        
						<div class="form-check" style = "display:none" id="visitDiv">
                            <b>Filters</b><br>
							<input class="form-check-input" type="checkbox" value="" id="visitCheck"  checked>
                            <label class="form-check-label">Number of visits per day</label>
                        </div>
                    </div>
                    
                </div>
                <div class = "row">
                    <div class ="col-lg-9 col-lg-offset-3" style="margin-left: 425px;">
                            <div class="form-check"style = "display:none" id="casesDiv">
                                <input class="form-check-input" type="checkbox" value="" id="caseCheck" checked>
                                <label class="form-check-label">Number of  diagnosed cases visits per day</label>
                            </div>
                    </div>
                </div>
            </div>
			
            <div class= "form-group" id = "message" style = "display: none"> </div>
			<div id = "row" style = "margin:50px">
				<div id="dayvisits">
					<div id = "chart_container" style = "text-align: center">	
						<canvas id="chart_search" style="width:640px; height: 400px; display: inline-block"></canvas>
					</div>
				</div>
			</div>
			
        </form>
		<?php
			include_once("../footer.php");
		?>
	</body>
</html>