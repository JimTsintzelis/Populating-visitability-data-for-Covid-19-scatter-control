$( function() {
			const labels = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var data = [];
    $( "#datepickerFrom" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepickerTo" ).datepicker({ dateFormat: 'yy-mm-dd' });

    $('#visitCheck').change(function(){
        $('#chart_container').html('');
	    $('<canvas id="chart_search"></canvas>').appendTo($("#chart_container"));
        checkChecked();
    });

    $('#caseCheck').change(function(){
        $('#chart_container').html('');
	    $('<canvas id="chart_search"></canvas>').appendTo($("#chart_container"));
        checkChecked();
    });

    $('#search').on('click', function(e){

        $('#chart_container').html('');
	    $('<canvas id="chart_search"></canvas>').appendTo($("#chart_container"));
        e.preventDefault();
        var dateFrom = $('#datepickerFrom').val();
        var dateTo = $('#datepickerTo').val();
        
        if(dateFrom == "" || dateTo == ""){
            alert("Please select a date");
            return;
        }

        var dateF = new Date(dateFrom);
        var dateT = new Date(dateTo);

        if(dateF >= dateT){
            alert("Η ημερομηνία από πρέπει να είναι μικρότερη από την ημερομηνία έως");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../admin/dayvisits2.php",
            data: {dateFrom:dateFrom, dateTo: dateTo},
            success: function(response){
                $('#chart_search').show();
               
                var chart_data_visits = [];
                for(i = 1 ;i <= 7; i++){
                    if(response.visits_per_day.filter(e => e.day == i).length <= 0){
                        response.visits_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
                    }
                }
                for(i = 0; i < response.visits_per_day.length; i++){
                    chart_data_visits.push(response.visits_per_day[i].num);
                }
                var chart_data_cases = [];
                for(i = 1 ;i <= 7; i++){
                    if(response.cases_per_day.filter(e => e.day == i).length <= 0){
                        response.cases_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
                    }
                }
                for(i = 0; i < response.cases_per_day.length; i++){
                    chart_data_cases.push(response.cases_per_day[i].num);
                }
                var ctx = document.getElementById('chart_search').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of visits per day',
                            data: chart_data_visits,
                            backgroundColor: 'rgba(20,20,60,0.4)',//red
                            borderWidth: 1
                        },
                        {
                            label: 'Number of  diagnosed cases visits per day',
                            data: chart_data_cases,
                            backgroundColor: 'rgba(120,120,255,0.4)',//blue
                            borderWidth: 1
                        }]
                    },
					options:{
							legend: {
								display:false
							}
					}
                }); 
                $('#visitDiv').show();
                $('#casesDiv').show();
                data = response;
            },
            error: function(response){
                console.log(response);
            }
        });
      });

      function checkChecked(){
            $('#chart_search').show();
          var visitChecked = $('#visitCheck').is(":checked");
          var caseChecked = $('#caseCheck').is(":checked");
            if(visitChecked && !caseChecked){
				var chart_data_visits = [];
                for(i = 1 ;i <= 7; i++){
                    if(data.visits_per_day.filter(e => e.day == i).length <= 0){
                        data.visits_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
                    }
                }
                for(i = 0; i < data.visits_per_day.length; i++){
                    chart_data_visits.push(data.visits_per_day[i].num);
                }
                var ctx = document.getElementById('chart_search').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Number of visits per day',
                            data: chart_data_visits,
                            backgroundColor: 'rgba(20,20,60,0.4)',
                            borderWidth: 1
                        }]
                    },
					options:{
						legend: {
							display:false
						}
					}
                }); 
          }
          else if(!visitChecked && caseChecked){
			var chart_data_cases = [];
			for(i = 1 ;i <= 7; i++){
				if(data.cases_per_day.filter(e => e.day == i).length <= 0){
					data.cases_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
				}
			}
			for(i = 0; i < data.cases_per_day.length; i++){
				chart_data_cases.push(data.cases_per_day[i].num);
			}
            var ctx = document.getElementById('chart_search').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                    {
                        label: 'Number of  diagnosed cases visits per day',
                        data: chart_data_cases,
                        backgroundColor: 'rgba(120,120,255,0.4)',
                        borderWidth: 1
                    }]
                },
				options:{
					legend: {
						display:false
						}
				}
            }); 
          }
          else if(visitChecked && caseChecked){
			    var chart_data_visits = [];
                for(i = 1 ;i <= 7; i++){
                    if(data.visits_per_day.filter(e => e.day == i).length <= 0){
                        data.visits_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
                    }
                }
                for(i = 0; i < data.visits_per_day.length; i++){
                    chart_data_visits.push(data.visits_per_day[i].num);
                }
                var chart_data_cases = [];
                for(i = 1 ;i <= 7; i++){
                    if(data.cases_per_day.filter(e => e.day == i).length <= 0){
                        data.cases_per_day.splice(i-1, 0,{day: i.toString(), num:0}); 
                    }
                }
                for(i = 0; i < data.cases_per_day.length; i++){
                    chart_data_cases.push(data.cases_per_day[i].num);
                }
            var ctx = document.getElementById('chart_search').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of visits per day',
                        data: chart_data_visits,
                        backgroundColor: 'rgba(20,20,60,0.4)',
                        borderWidth: 1
                    },
                    {
                        label: 'Number of diagnosed cases visits per day',
                        data: chart_data_cases,
                        backgroundColor: 'rgba(120,120,255,0.4)',
                        borderWidth: 1
                    }]
                },
				options:{
					legend: {
						display:false
					}
				}
            }); 
          }
          else if(!visitChecked && !caseChecked){
              $('#chart_search').hide();
          }
      }
    
  } );