<?php 
class LogIn
{
	private $pdo;
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function test()
	{
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$statement = $this->pdo->query(
			"SELECT * FROM user WHERE user.name = '$username'"
			);
		$data = $this->pdo->resultset();
		return $data;	
	}

	public function logInUser()
	{
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$statement = $this->pdo->query(
			"SELECT * FROM user WHERE user_name = '$username'"
			);
		$data = $this->pdo->resultset()[0];

		$_SESSION['is_admin'] = $data['is_admin'];
		$_SESSION['user_id'] = $data['user_id'];

		if ($data)
		{
			//print_r($data);
			//echo $data['password'];
			if (password_verify( $password, $data['password'])) 
			{
				//Password = valid
				$_SESSION['username'] = $username;
				if($data['is_admin'] == 1)
				{	
					$_SESSION['loggedIn'] = true;
					$_SESSION['username'] = $username;
					//echo 'är admin';
					header("Location: logout.php");
					//admin
				}
				else
				{
					$_SESSION['loggedIn'] = true;
					$_SESSION['username'] = $username;	
					//echo 'är inte admin';					
					header("Location: logout.php");
					 //user 
				}
			} 
				else 
				{
					header("Location: ../index.php");
					//echo 'password är fel';
					//password = invalid
				}

			}
}

}
//}
?>