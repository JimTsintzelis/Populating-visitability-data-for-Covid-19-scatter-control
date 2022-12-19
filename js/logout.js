function systemlogout(){
	var conf = confirm("Do you want to logout?");
	if(conf){
		console.log("Logout");
		$.ajax({
			type: "POST",
			url: "../logout.php",
			success: function(response){
				window.location = "../index.php";
			}
		});
	}
}