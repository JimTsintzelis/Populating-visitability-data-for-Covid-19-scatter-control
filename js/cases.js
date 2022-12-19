$(document).ready(function(){
    $( "#diagdate" ).datepicker({ dateFormat: 'yy-mm-dd' });

    $.ajax({
        type: "POST",
        url: "../user/getCases.php",
        success: function(response){
            console.log(response);
            setTableCase(response);
        },
        error: function(response){
            console.log(response);
        }
    });
});

function setTableCase(case_table){
    var table = document.getElementById("case_table");
    if(table != null){
        while(table.rows.length > 0) {
            table.deleteRow(0);
        }
    }
    var tbody = document.createElement("tbody");
    var row = document.createElement("tr");
    var cellElement = document.createElement("th");
	var cellContent = document.createTextNode("Visit Date");
    cellElement.appendChild(cellContent);
    row.appendChild(cellElement);
    var cellElement = document.createElement("th");
	var cellContent = document.createTextNode("POI");
    cellElement.appendChild(cellContent);
    row.appendChild(cellElement);
    var cellElement = document.createElement("th");
    var cellContent = document.createTextNode("Address");
    cellElement.appendChild(cellContent);
    row.appendChild(cellElement);
    tbody.appendChild(row);
    for(var i = 0; i < case_table.length; i++){
        var row = document.createElement("tr");
        var cellElement = document.createElement("td");
        var cellContent = document.createTextNode(case_table[i].date_visit);
        cellElement.appendChild(cellContent);
        row.appendChild(cellElement);
        var cellElement = document.createElement("td");
        var cellContent = document.createTextNode(case_table[i].name);
        cellElement.appendChild(cellContent);
        row.appendChild(cellElement);
        var cellElement = document.createElement("td");
        var cellContent = document.createTextNode(case_table[i].adress);
        cellElement.appendChild(cellContent);
        row.appendChild(cellElement);
        
        tbody.appendChild(row);
    }
    table.appendChild(tbody);
    $("#case_table").css('display', 'block');
}

function subm(){
    var dateOfCase = $('#diagdate').val();

    if(dateOfCase == ''){
        alert("Please select the date you were diagnosed positive");
        return;
    }

    var conf = confirm("Are you sure you want to declare yourself as a covid case?");
    if(conf){
        $.ajax({
            type: "POST",
            data:{dateOfCase: dateOfCase},
            url: "../user/caseInput.php",
            success: function(response){
                console.log(response);
                if(response == "1"){
                    alert("Your covid case has been inserted successfully");
                    location.reload();
                }
                else if (response == "-1"){
                    alert("You have been already recorded as a covid case. The period of 14 days has not exceeded.");
                }
                else{
                    alert("There was an unexpected error");
                }
            },
            error: function(response){
                console.log(response);
            }
        });
    }
}