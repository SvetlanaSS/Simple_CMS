<?php

/**
 * 
 */
function get_data_from_api($url, $query_string=''){
	//var_dump($url . $query_string);
	$ch = curl_init(); //initiate cURL request
	curl_setopt($ch, CURLOPT_URL, $url . $query_string); //set url
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //return content
	$data = curl_exec($ch); //execute the request
	curl_close($ch); //close the request
	//var_dump($data);
	return $data; //return the data
}

/**
 * 
 */
function get_array_from_json($response){
	return json_decode($response, true);
}

/**
 * 
 */
function get_query_string($array){
	$query_string = '';
	foreach ($array as $key => $value) {
		//echo $key;
		$query_string .= encode_uri_component($key) . '=' . encode_uri_component($value) . '&'; 
	}
	return $query_string;
}

/**
 * 
 */
function encode_uri_component($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

?>