<head>
	<link rel="stylesheet" href="../css/mycss.css"/>
	<link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
</head>
  <nav class="stroke" style="padding:0px;">
    <ul>
	  <li><a href="cases.php">Covid cases</a></li>
	  <li><a href="poi.php">Point of Interest (POI)</a></li>
	   <li><a href="history.php">History</a></li>
      <li><a href="account.php">My Account</a></li>
    </ul>
	  <form class='navbar-form navbar-right' method = 'post' action = "logout.php" style="margin-top:-50px;">
			<?php echo "<b>" . $_SESSION["user_id"] ."</b>"?> <button type='button' class="btn btn-default" name='logout' onclick = "systemlogout()" id='logout'>Logout</button>
	</form>
		
  </nav>