<?php 
class LogIn
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function logInUser()
	{
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$statement = $this->pdo->query(
			"SELECT * FROM user WHERE user_name = '$username'"
			);
		$data = $this->pdo->resultset();
		if (count($data) >= 1)
		{	
			$data = $this->pdo->resultset()[0];	
			$_SESSION['is_admin'] = $data['is_admin'];
			$_SESSION['user_id'] = $data['user_id'];				

			if (password_verify( $password, $data['password'])) 
			{
				//Password = valid
				$_SESSION['username'] = $username;
				if($data['is_admin'] == 1)
				{
					//admin	
					$_SESSION['loggedIn'] = true;
					$_SESSION['username'] = $username;
					//echo 'är admin';
					header("Location: ../index.php");
				}
				else
				{
					//user 
					$_SESSION['loggedIn'] = true;
					$_SESSION['username'] = $username;	
					//echo 'är inte admin';					
					header("Location: ../index.php");
				}
			} 
			else 
			{
				//password = invalid
				header("Location: ../login.php?error_message=passinvalid");
				//echo 'password är fel';
			}
		}
		else
		{
			// finns ingen sådan användare
			header("Location: ../login.php?error_message=nouser");
			//echo 'okänd användare';
		}
	}

}
?>