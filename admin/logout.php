<?php
session_start();
echo 'Welcome ' .$_SESSION['username'];
?>

<form  method="post" name="logout" action="logout-logic.php">
	<input type="submit" name="logout" value="log me out">
</form>
