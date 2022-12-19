function showData(){
			var container = document.getElementById("message");
            var pswField = document.getElementById("pwd");
            var regular_expression = new RegExp("^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            var pswValid = false;
            $.ajax({
                type: "GET",
                url: "../user/getUserInfo.php",
                success: function(response){
                    $('#username').val(response.username);
                    $('#pwd').val(response.password);
                }
            });
            pswField.onkeyup = function(){
                if(!regular_expression.test(pswField.value)){
                    $('#change_btn').prop('disabled', true);
                    var text = "- Password must be at least 8 characters long and contain at least one capital letter, a number and a symbol (eg *&@#$)";
                    container.innerHTML = text;
                    container.style = "display: block; color: red";

                }
                else{
                    $('#change_btn').prop('disabled', false);
                    pswValid = true;
                    container.style = "display: none";
                }
            }
     
            pswField.onblur = function(){
                container.innerHTML = "";
                container.style = "display: none";
            }	
}

function newpass(){
    var pswField = document.getElementById("pwd").value;
    $.ajax({
        type: "POST",
        url: "../user/changePass.php",
        data: {password: pswField},
        success: function(response){
            alert("Password has been successfully changed!");
            $('#change_btn').attr('disabled', true);
        }
    });
}
