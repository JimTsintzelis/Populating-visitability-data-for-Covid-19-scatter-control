$(document).ready(function(){
	var pswField = document.getElementById("psw");
	var usernameField = document.getElementById("uname");
	var container = document.getElementById("message");

	$("#login_btn").click(function(){
		container.innerHTML = "";
		var valid = true;
		if(usernameField.value == ""){
			var text = "- Please, enter your username!";
			container.innerHTML += text+"<br>";
			container.style = "display: block; color: red";
			valid = false;
		}
		if(pswField.value == ""){
			var text = "- Please, enter your password!";
			container.innerHTML += text+"<br>";
			container.style = "display: block; color: red";
			valid = false;
		}
		if(valid){
			$.ajax({
				type: "POST",
				url: "check.php",
				data: {username: usernameField.value, password: pswField.value},
				success: function(response){
					if(response == 1){
						var text = "Username or password incorrect";
						container.innerHTML = text+"<br>";
						container.style = "display: block; color: red";
					}
					else{
						if(response == "admin"){
							window.location.href = "../project/admin/statistics1.php";
						}
						else{
							window.location.href = "../project/user/cases.php";
						}
					}
				}
			});
		}
		
		
	});
});