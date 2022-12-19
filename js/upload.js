function uploading(){
	var fileInput = document.getElementById("file"); 
	if(fileInput.files.length == 0 ){
		alert("Please choose a file to upload");
	}
	var file = fileInput.files[0];
	var formData = new FormData();
	formData.append('file', file);
	const request = $.ajax({
		type: 'POST',
		url: "../admin/upload2.php",
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	});
	
	request.done(onSuccess);
}

function deletion(){
	if(confirm("Are you sure you want to delete all data?")){
		$.ajax({
			type: 'POST',
			url: "delete.php",
			success: function(result){
					alert("All data deleted successfully");
				
			}
		});
	}
}

function onSuccess(responseText){
	console.log(responseText);
	if(responseText == 111){
		alert("Επιτυχής εισαγωγή του αρχείου");
		location.reload();
	}
	else{
		alert("Υπήρξε ένα μη αναμενόμενο σφάλμα");
	}
}