<?php 
require_once '../includes/Database.php';
require_once '../includes/error.php';
require_once 'User.php';

$database = new Database();
$user = new User($database);
$validation_class = '';
if(! $user->isRegistredUser()){
	$user->addUser();
	header("Location: /simple-cms-group/Simple_CMS/login.php?registerSuccess=true");
}
else
{
	//print_r($user->getErrormessage());
	//echo isset($user->getErrormessage()['emailError']);
	$nameError = isset($user->getErrormessage()['nameError']) ? $user->getErrormessage()['nameError']: '';
	$emailError = isset($user->getErrormessage()['emailError']) ? $user->getErrormessage()['emailError']: '';	
	header("Location: /simple-cms-group/Simple_CMS/register.php?emailError=$emailError&nameError=$nameError");
}
?>