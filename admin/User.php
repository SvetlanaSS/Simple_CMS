<?php
class User
{
	private $pdo;
	private $errorMessage = array();

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function addUser()
	{
		$userName = isset($_POST['userName']) ?  $_POST['userName'] : '';
		$password = isset($_POST['userPassword']) ?  password_hash($_POST['userPassword'], PASSWORD_DEFAULT) : '';
		$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : '';
		$isAdmin = 0;

		$this->pdo->query('INSERT INTO user (name, email, password, is_admin) VALUES (:name, :email, :password, :is_admin)');		

		$this->pdo->bind(':name', $userName);
		$this->pdo->bind(':email', $userEmail);
		$this->pdo->bind(':password', $password);
		$this->pdo->bind(':is_admin', $isAdmin);

		$this->pdo->execute();		
	}

	public function isRegistredUser()
	{
		$isRegistred = false;
		$userName = isset($_POST['userName']) ?  $_POST['userName'] : '';
		$userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : '';

		$this->pdo->query("SELECT * FROM user WHERE name='$userName'");
		$this->pdo->execute();
		if($this->pdo->rowCount() > 0){
			$this->setErrorMessage('nameError','Användarnamnet är redan taget. Vänligen välj ett annat');
			$isRegistred = true;			
		}

		$this->pdo->query("SELECT * FROM user WHERE email='$userEmail'");
		$this->pdo->execute();
		if($this->pdo->rowCount() > 0){
			$this->setErrorMessage('emailError', 'Email-adressen är redan registrerad. Vänligen välj ett annat');
			$isRegistred = true;			
		}		

		return $isRegistred;
	}	

	public function getErrorMessage()
	{
		return $this->errorMessage;
	}

	public function setErrorMessage($key, $message)
	{
		$this->errorMessage[$key] = $message;
	}	
}

?>