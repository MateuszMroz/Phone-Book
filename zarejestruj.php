<?php
	require "Registration.php";
	require "Datebase.php";
	
	session_start();
	
	if(isset($_POST['mail'])) {
		
		// walidacja danych
		$registration = new Registration;
		
		$nick = $_POST['nick'];
		$registration->checkNick($nick, 'rejestracja.php');
		
		$userPassword1=$_POST['user_password1'];
		$userPassword2=$_POST['user_password2'];
		$registration->checkPassword($userPassword1, $userPassword2, 'rejestracja.php');
		$hashUserPassword = password_hash($userPassword1, PASSWORD_DEFAULT);
		
		
		$userName=$_POST['user_name'];
		$userSurname=$_POST['user_surname'];
		$registration->checkNameANDSurname($userName, $userSurname, 'rejestracja.php');
		
		$mail=$_POST['mail'];
		$registration->checkMail($mail, 'rejestracja.php');
		
		//$registration->checkReCaptcha();		
	
		//sprawdzanie bazy danych	
		if($registration->checkNick($nick, 'rejestracja.php')&&
			$registration->checkPassword($userPassword1, $userPassword2, 'rejestracja.php')&&
			$registration->checkNameANDSurname($userName, $userSurname, 'rejestracja.php')&&
			$registration->checkMail($mail, 'rejestracja.php')/*&&
			$registration->checkReCaptcha()*/) {
		
			$datebase = new Datebase();
			
			$queryMail="SELECT id FROM uzytkownicy WHERE email='$mail'";
			
			$mail = $datebase->queryToDatabase($queryMail);
			$countMail = $mail->num_rows;
			
			if($registration->checkCountMail($countMail)){
				$mail=$_POST['mail'];
			}			
		
			$queryNick="SELECT id FROM uzytkownicy WHERE nick='$nick'";
			
			$nick = $datebase->queryToDatabase($queryNick);
			$countNick = $nick->num_rows;
			
			if($registration->checkCountNick($countNick)){
				$nick = $_POST['nick'];
			} 
		}
		//wszystko OK wysyłanie danych
		if(($registration->checkCountMail($countMail))&&($registration->checkCountNick($countNick))) {
			
			$insertInto = "INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$hashUserPassword', '$userName', '$userSurname', '$mail')";
			
			$datebase->insertIntoDatabase($insertInto);
		}
	
		$datebase->closeConnect();
		
		header('Location:index.php');
	}
?>