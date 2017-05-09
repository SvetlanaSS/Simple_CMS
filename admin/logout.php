<?php
session_start();
echo 'Welcome ' .$_SESSION['username'];

if (isset($_POST['logout']))
{
	//echo 'hej';
	session_start();
	session_destroy();

	header('location: ../login.php');
}
?>

<form  method="post" name="logout" action="logout.php">
	<input type="submit" name="logout" value="log me out">
</form>
