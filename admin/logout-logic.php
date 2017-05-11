<?php
session_start();

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\admin');
$redirect = 'login.php';
//echo $host . '/' . $uri . '/' . $redirect ;

session_destroy();
header("Location: http://$host$uri/$redirect");
?>