<?php
	require "Datebase.php";
	require "Registration.php";
	
	session_start();
	
	$datebase = new Datebase;
	$registration = new Registration;
	
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$phoneNumber=$_POST['phoneNumber'];
	$mail=$_POST['mail'];
	$note=$_POST['note'];
	
	$userID=$_SESSION['id'];
	
	$insertNewContact = "INSERT INTO kontakty VALUES (NULL, '$name', '$surname', '$phoneNumber', '$mail', '$note', '$userID')";
	$datebase->insertIntoDatabase($insertNewContact);
	
	$datebase->closeConnect();
	header('Location:panelGlowny.php');
	
?>