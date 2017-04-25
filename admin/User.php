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

		$this->pdo->query('INSERT INTO user (user_name, email, password, is_admin) VALUES (:user_name, :email, :password, :is_admin)');
		$this->pdo->bind(':user_name', $userName);
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

		$this->pdo->query("SELECT * FROM user WHERE user_name='$userName'");
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

	public function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	public function isEmailFieldValid($fieldName) {
		$emailErr = false;
		if (empty($_POST[$fieldName])) {
			$this->setErrorMessage('emailError', 'Vänligen fyll i mejladress');
			$emailErr = true;
	  	} else {
	    	$email = $this->test_input($_POST[$fieldName]);
	    	// check if e-mail address is well-formed
		    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		      $this->setErrorMessage('emailError', 'Mejladressen är inte giltig. Vänligen prova igen.');
		      $emailErr = true;
		    }
		}
		return $emailErr;
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
