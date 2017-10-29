<?php
	require "Registration.php";
	require "Datebase.php";
	
	session_start();
	
	if(isset($_POST['mail'])) {
		
		// walidacja danych
		$registration = new Registration;
		
		$nick = $_POST['nick'];
		$registration->checkNick($nick, 'registrationSite.php');
		
		$userPassword1=$_POST['user_password1'];
		$userPassword2=$_POST['user_password2'];
		$registration->checkPassword($userPassword1, $userPassword2, 'registrationSite.php');
		$hashUserPassword = password_hash($userPassword1, PASSWORD_DEFAULT);
		
		
		$userName=$_POST['user_name'];
		$userSurname=$_POST['user_surname'];
		$registration->checkNameANDSurname($userName, $userSurname, 'registrationSite.php');
		
		$mail=$_POST['mail'];
		$registration->checkMail($mail, 'registrationSite.php');
		
		//$registration->checkReCaptcha();		
		
		$_SESSION['reg_nick'] = $nick;
		$_SESSION['reg_mail'] = $mail;
		$_SESSION['reg_password_one'] = $userPassword1;
		$_SESSION['reg_password_two'] = $userPassword2;
		$_SESSION['reg_name'] = $userName;
		$_SESSION['reg_surname'] = $userSurname;
		
		//sprawdzanie bazy danych	
		if($registration->checkNick($nick, 'registrationSite.php')&&
			$registration->checkPassword($userPassword1, $userPassword2, 'registrationSite.php')&&
			$registration->checkNameANDSurname($userName, $userSurname, 'registrationSite.php')&&
			$registration->checkMail($mail, 'registrationSite.php')/*&&
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
			
			$_SESSION["correct_registration"] = true;
			
			header('Location:welcome.php');
		}
		else {
			header('Location:index.php');
		}
	
		$datebase->closeConnect();
		
	}
?>