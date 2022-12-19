<?php
	session_start();
	if(!file_exists($_FILES["file"]["name"]))
	{
		move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
	}
	include_once("../connect.php");
	$file = file_get_contents($_FILES["file"]["name"]);//read files(stri)
	$data = json_decode($file); //decode json
	$types_query = "INSERT IGNORE INTO types(type) VALUES"; //for duplica
	$pois_query = "INSERT IGNORE INTO pois(id, name, adress, types, lat, lng, rating) VALUES";
	$poptimes_query = "INSERT IGNORE INTO popular_times(poi_id, day, hour, popularity) VALUES";
	$poi_ids = array();
    foreach($data as $poi){    
		foreach($poi->types as $type){
		 	$types_query .= "('".$type."'),"; // types
		}

		if(!in_array($poi->id, $poi_ids)){ //(search,array)δεν υπαρχει id
			$poi_ids[] = $poi->id; //sto poi vale to id kai auto ston pin
			if(isset($poi->rating)){ // εαν υπαρχει rating βαλε τα δεδομ
				$pois_query .="('".$poi->id."', '".$mysql_link->real_escape_string($poi->name)."', '".$poi->address."', '".implode(",", $poi->types)."', ".$poi->coordinates->lat.", ".$poi->coordinates->lng.", ".$poi->rating."),";  //pois me rating
			}
			else{ // χωρις rating
				$pois_query .="('".$poi->id."', '".$mysql_link->real_escape_string($poi->name)."', '".$poi->address."', '".implode(",", $poi->types)."', ".$poi->coordinates->lat.", ".$poi->coordinates->lng.", NULL),"; //pois xwris rating
			}
		     //pop_times
			for($i = 0; $i< count($poi->populartimes); $i++){
				for($j = 0; $j< count($poi->populartimes[$i]->data); $j++){
					$poptimes_query .= "('".$poi->id."', ".$i.", ".$j.", ".$poi->populartimes[$i]->data[$j]."),";
				}
			}
    	}
	}
	
	if($mysql_link->query(substr($types_query ,0,-1))){ //returns types_q
		echo 1;
	}
	else{
		echo 0;
	} 
	if($mysql_link->query(substr($pois_query ,0,-1))){
		echo 1;
	}
	else{
		echo 0;
	} 
	if($mysql_link->query(substr($poptimes_query ,0,-1))){
		echo 1;
	}
	else{
		echo 0;
	} 
	$mysql_link->close();
?>