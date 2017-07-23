<?php
	require "Datebase.php";
	require "LogIn.php";
	
	session_start();
	
	if((!isset($_POST['mail']))||(!isset($_POST['user_password']))) {
		header('Location: index.php');
		exit();
	}
	
	$datebase = new Datebase();
	
	$loginToDatebase = new LogIn;
	
	$email=$_POST['mail'];
	$password=$_POST['user_password'];
	
	$loginToDatebase->findUserInDatebase($email, $password, $datebase);
		
?>
