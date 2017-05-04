<?php 
/**
 * Register logic
 */
require_once '../includes/Database.php';
require_once '../includes/error.php';
require_once '../includes/helperFunctions.php';
require_once '../includes/formValidation.php';
require_once 'User.php';

$database = new Database();
$user = new User($database);

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
$redirect = '';

if(! $user->isRegistredUser()){
	$user->addUser();
	$redirect = 'login.php?registerSuccess=true';
	header("Location: http://$host$uri/$redirect");
}else{
	//print_r($user->getErrormessage());
	$redirect =  'register.php?' . get_query_string($user->getErrormessage());
	header("Location: http://$host$uri/$redirect");
}
?>