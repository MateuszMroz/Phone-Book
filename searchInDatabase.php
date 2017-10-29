<?php
	
	require "Contact.php";
	
	$contact = new Contact;
	
	$actualUserID = $_SESSION['id'];
	
	$contact->findContact($actualUserID, 'mainPanelSite.php');
	
?>