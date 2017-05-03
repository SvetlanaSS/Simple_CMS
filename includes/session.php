<?php	
	if (session_status() == PHP_SESSION_NONE){
		session_start();
		$_SESSION['name'] = "Attila";
	}

	$hash = password_hash('pass', PASSWORD_DEFAULT);
	
	if(password_verify('pass', $hash)){
		//echo ‘Yesman’;
		$_SESSION['loggedIn'] = true;
	}else{
		echo ‘Nein’;
	}

	var_dump($_SESSION['loggedIn']);
	


?>