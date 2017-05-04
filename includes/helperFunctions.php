<?php
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