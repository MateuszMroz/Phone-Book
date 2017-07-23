<?php

	require "Datebase.php";

	$idNumber=$_POST['id'];
	$editName=$_POST['editName'];
	$editSurname=$_POST['editSurname'];
	$editPhoneNumber=$_POST['editPhoneNumber'];
	$editMail=$_POST['editMail'];
	$editNote=$_POST['editNote'];
	
	$datebase = new Datebase;
	
	if(!empty($_POST['editName'])){
		$query= "UPDATE kontakty SET imie='$editName' WHERE id='$idNumber'";
		$datebase->queryToDatabase($query);
	}
	
	if(!empty($_POST['editSurname'])){
		$query= "UPDATE kontakty SET nazwisko='$editSurname' WHERE id='$idNumber'";
		$datebase->queryToDatabase($query);
	}
	
	if(!empty($_POST['editPhoneNumber'])){
		$query= "UPDATE kontakty SET numer_telefonu='$editPhoneNumber' WHERE id='$idNumber'";
		$datebase->queryToDatabase($query);
	}
	
	if(!empty($_POST['editMail'])){
		$query= "UPDATE kontakty SET mail='$editMail' WHERE id='$idNumber'";
		$datebase->queryToDatabase($query);
	}
	
	if(!empty($_POST['editNote'])){
		$query= "UPDATE kontakty SET notatka='$editNote' WHERE id='$idNumber'";
		$datebase->queryToDatabase($query);
	}
	
	header('Location:edycjaKontaktu.php');

?>