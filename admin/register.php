 <?php 
	require_once '../includes/Database.php';
	require_once '../includes/error.php';
	require_once 'User.php';

	$database = new Database();
	$user = new User($database);

	if(! $user->isRegistredUser()){
		$user->addUser();
		echo 'Alrighty then. You are registred.';
	}
	else
	{
		//print_r($user->getErrormessage());
		if(count($user->getErrormessage())){
			foreach($user->getErrormessage() as $message){
				echo $message;
			}
		}
	}
 ?> 