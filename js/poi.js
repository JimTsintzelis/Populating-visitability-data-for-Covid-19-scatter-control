var userLoc =null;
var currentLayer = null;
$(document).ready(function(){

    getAllTypes();

    var map = L.map('map');
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    map.setView([38.2462420, 21.7350847], 14);
    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems)
    
    map.on('click',onMapClick );
    

    function onMapClick(e) {
        if(userLoc == null){
            marker = L.marker(e.latlng).addTo(map);

            var latLngs = [ marker.getLatLng() ];
            userLoc = marker;
            map.setZoom(14);
            map.panTo(e.latlng, 14);
            
            $('#search').prop('disabled', false);
            $('#types').prop('disabled', false);
        }
    }

    $('#search').on('click', function(){
        var selOption = text = $('#types option:selected'). text();
        $.ajax({
            type: "POST",
            data:{type: selOption},
            url: "../user/searchPOI.php",
            success: function(response){
                if(currentLayer != null){
                    map.removeLayer(currentLayer);
                }
                console.log(response);
                var hour = (new Date()).getHours();
                var day = (new Date()).getDay();
                let markersLayer = new L.LayerGroup();
                currentLayer = markersLayer;
                map.addLayer(markersLayer);
                for(id in response){
                    var loc = {lat: parseFloat(response[id].location.lat),lng: parseFloat(response[id].location.lng)};
                    var user = userLoc.getLatLng();
                    if(haversine_distance(loc, user) <= 5){
                        var popularity = response[id].popularity[day][hour];
                        var newMarker = null;
                        if(popularity >= 0 && popularity<= 32){
                            var greenIcon = new L.Icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                              });
                              newMarker = L.marker(loc, {icon: greenIcon, name:response[id].name}).addTo(map);
                        }
                        else if(popularity >= 33 && popularity<= 65){
                            var yellowIcon = new L.Icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                              });
                              newMarker = L.marker(loc, {icon: yellowIcon, name:response[id].name}).addTo(map);
                        }
                        else{
                            var redIcon = new L.Icon({
                                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41]
                              });
                              newMarker = L.marker(loc, {icon: redIcon, name:response[id].name});
                         }
                        var popupString = "<table id=\"info\"><tr><td><b>Name</b><pre>" + response[id].name+"</pre></td><td></td></tr><td><b>Address</b><pre>"+response[id].adress+"</pre></td><td><b>Rating: </b><pre>"+response[id].rating+"</pre></td></tr><tr><td><b>Type: </b><pre><ul  style=\"list-style-type:none;\">";
                        for(i = 0 ; i < response[id].types.length; i++){
                            popupString += "<li>"+response[id].types[i]+"</li>"
                        }
                        popupString += "</ul></pre></td></tr></table>"
						popupString += "<b><pre>Your distance: <b> "+(haversine_distance(loc, user) * 1000).toFixed(2)+" m </pre>";
						 
						// Number of visitors
                        popupString += "<input type='number' id='ektimisi' placeholder='Number of visitors' class='form-control' >";
                        popupString += "<button type='button' id = 'visitbtn' class='btn btn-primary' style='margin-left: 210px; margin-top: -52px;'>Submit</button><br>";
						
						popupString += "<b>Predictions<b><pre><ul style=\"list-style-type:none;\"><li>"+(hour+1)+":00 ("+response[id].popularity[day][hour+1]+"%)</li><li>"+(hour+2)+":00 ("+ response[id].popularity[day][hour+2]+"%)</li></ul></pre>";
						popupString += "</div>";
                  
						
						
						//if(haversine_distance(loc, user) <= 0.02){
                            popupString += "<p id ='poi_id' style ='display:none'>"+id+"</p>";
                            popupString += "<p id ='name' style ='display:none'>"+response[id].name+"</p>";
                            popupString += "<form>";
                            popupString += "<div class='form-group'>";
                            
                            popupString += "</form>";
                        //}
                        newMarker.bindPopup(popupString);
                        newMarker.addTo(markersLayer);
                        
                    }
                }
            },
            error: function(response){

            }
        }); 

        $('#map').on('click', '#visitbtn', function(){
            var id = $('#poi_id').text();
            var name = $('#name').text();
            var ektimisi = $('#ektimisi').val();
            var conf = confirm("Are you sure you want to declare your visit at POI "+name+";");
            if(conf){
                $.ajax({
                    type: "POST",
                    data:{id: id, ektimisi: ektimisi},
                    url: "../user/visit.php",
                    success: function(response){
                        if(response == "1"){
                            alert("Successful Visit");
                        }
                        else{
                            alert("There was an unexpected error!");
                        }
                    },
                    error: function(response){
                        console.log(response);
                    }
                });
            }

        });
    });



    function haversine_distance(mk1, mk2) {
        // Radius of the Earth in miles
		R = 6371.0710; 
		// Convert degrees to radians
        var rlat1 = mk1.lat * (Math.PI/180);
		// Convert degrees to radians		
        var rlat2 = mk2.lat * (Math.PI/180);
		// Radian difference (latitudes)		
        var difflat = rlat2-rlat1; 
		// Radian difference (longitudes)
        var difflon = (mk2.lng-mk1.lng) * (Math.PI/180); 
        var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
        return d;
      }
    
    function getAllTypes(){
        $.ajax({
            type: 'POST',
            url: '../user/types.php',
            success: function(response){
                console.log(response);
                var ispList = document.getElementById("types");
                for(i = 0; i < response.length; i++){
                    var option = document.createElement("option");
                    option.text = response[i];
                    ispList.appendChild(option);
                }
            }
        });
    }

});







