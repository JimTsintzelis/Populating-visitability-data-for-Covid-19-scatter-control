<head>
	<link rel="stylesheet" href="../css/mycss.css"/>
	<link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
</head>

  <nav class="stroke" style="padding:0px;">
    <ul>
      
      <li><a href="statistics1.php">Statistics</a></li>
      <li><a href="dayvisits1.php">Visits/days</a></li>
      <li><a href="hourvisits1.php">Visits/Hour</a></li>
	  <li><a href="upload1.php">Data Upload</a></li>

    </ul>
	  <form class='navbar-form navbar-right' method = 'post' action = "logout.php" style="margin-top:-50px;">
			<?php echo "<b>" . $_SESSION["user_id"] ."</b>"?> <button type='button' class="btn btn-default" name='logout' onclick = "systemlogout()" id='logout'>Logout</button>
	</form>
		
  </nav>
