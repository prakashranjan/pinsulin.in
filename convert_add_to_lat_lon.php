<?php
 include("dbaseconnection.php"); 

/* 
* Given an address, return the longitude and latitude using The Google Geocoding API V3
*
*/
function Get_LatLng_From_Google_Maps($address) {


	$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false';


	// Make the HTTP request
	$data = @file_get_contents($url);
	// Parse the json response
	$jsondata = json_decode($data,true);


	// If the json data is invalid, return empty array
	if (!check_status($jsondata))	return array();


	$LatLng = array(
	    'lat' => $jsondata["results"][0]["geometry"]["location"]["lat"],
	    'lng' => $jsondata["results"][0]["geometry"]["location"]["lng"],
	);


	return $LatLng;
}



echo"starting";
$sql="Select id,address from labbranch";
$result=mysql_query($sql);
while($row=mysql_fetch_row($result))
{$add=$row[1];
$aid=$row[0];
$add = str_replace(' ', '+', $add);
$coordinates=Get_LatLng_From_Google_Maps($add);
$lati=$coordinates['lat'];
$long=$coordinates['lng'];

$s=mysql_query("UPDATE labbranch SET latitude='$lati', longitude='$long' WHERE id='$aid'");

echo'success'.$aid.'';
}


echo"all done success";


/* 
* Check if the json data from Google Geo is valid 
*/


function check_status($jsondata) {
	if ($jsondata["status"] == "OK") return true;
	return false;
}


/*
*  Print an array
*/


function d($a) {
	echo "<pre>";
	print_r($a);
	echo "</pre>";
}




?>