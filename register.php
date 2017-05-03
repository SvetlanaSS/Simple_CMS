<?php
require_once 'includes/error.php';
include_once "partials/head.php";
include_once "partials/navmenu.php";
require_once 'includes/Database.php';
require_once 'admin/User.php';

$database = new Database();
$user = new User($database);
$validation_class = '';

if(! $user->isRegistredUser()){
	$user->addUser();
	$validation_class = 'has-success';
	echo 'Alrighty then. You are registred.';
}
else
{
	//print_r($user->getErrormessage());
	//echo isset($user->getErrormessage()['emailError']);
	$nameError = isset($user->getErrormessage()['nameError']) ? $user->getErrormessage()['nameError']: '';
	$emailError = isset($user->getErrormessage()['emailError']) ? $user->getErrormessage()['emailError']: '';
	$validation_class = 'has-error';
	//echo $nameError;
	//echo $emailError; 
}
?>

<div class="container top_header">
  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
      <h1 class="text-center login-title">Registrera dig för att posta inlägg</h1>
      <hr>
      <div class="account-wall">     
      	<?php include_once "partials/register-form.php";?>   
      </div>
    </div>
  </div>
</div>

<?php
  include_once "partials/footer.php";
?>
