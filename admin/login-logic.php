<?php
session_start();
require_once '../includes/Database.php';
include_once "../includes/error.php";
include_once "login.php";
$database = new Database();
$logIn = new LogIn($database);
$logIn->logInUser();

?>