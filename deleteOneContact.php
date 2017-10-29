<?php

	require "Datebase.php";

	$idNumber=$_POST['id'];
	
	$datebase = new Datebase;
	
	$query= "DELETE FROM kontakty WHERE id='$idNumber'";
	
	$datebase->queryToDatabase($query);
	
	header('Location:removeContactSite.php');
?>