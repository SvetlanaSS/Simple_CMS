<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function isEmailFieldValid($fieldName) {
	if (empty($_POST[$fieldName])) {
		$emailErr = "Vänligen fyll i mejladress";
  	} else {
    	$email = test_input($_POST[$fieldName]);
    	// check if e-mail address is well-formed
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "Mejladressen är inte giltig. Vänligen prova igen."; 
	    }
	}
	return $emailErr;
}
?>