$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: "../admin/statistics2.php",
        success: function(response){
            $('#tot_vis').html(response.tot_visits);
            $('#tot_cases').html(response.tot_cases);
            $('#vis_cases').html(response.vis_cases);
        },
        error: function(response){
            console.log(response);
        }
    });
});