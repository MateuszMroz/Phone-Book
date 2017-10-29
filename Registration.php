<?php
	
	class Registration {
	
	public function checkNick($nick) {
		$walidation_OK= true;
		
		if(strlen($nick)<3||strlen($nick)>26) {
			$walidation_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 26 znaków!";
			header('Location:registrationSite.php');
		}
		
		if(ctype_alnum($nick)==false) {
			$walidation_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z cyfr i liter (bez polskich znaków).";
			header('Location:registrationSite.php');
		}
		
		return $walidation_OK;
	}
	
	public function checkPassword($userPassword1, $userPassword2) {
		$walidation_OK = true;

		if($userPassword1!=$userPassword2) {
			$walidation_OK=false;
			$_SESSION['e_password']="Hasła są różne!";
			header('Location:registrationSite.php');
		}
		
		if((strlen($userPassword1)<8)||(strlen($userPassword1)>20)) {
			$walidation_OK=false;
			$_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
			header('Location:registrationSite.php');
		}
		
		return $walidation_OK;
	}
	
	public function checkNameANDSurname($name, $surname) {
		$walidation_OK= true;
		
		if(strlen($name)<2||strlen($name)>26) {
			$walidation_OK=false;
			$_SESSION['e_name']="Imie musi posiadać od 2 do 26 znaków!";
			header('Location:registrationSite.php');
		}
		
		if(strlen($surname)<2||strlen($surname)>26) {
			$walidation_OK=false;
			$_SESSION['e_surname']="Nazwisko musi posiadać od 2 do 26 znaków!";
			header('Location:registrationSite.php');
		}
	
		return $walidation_OK;
	}
	
	
	public function checkMail($mail){
		$walidation_OK = true;
		$mailB=filter_var($mail, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($mailB,FILTER_VALIDATE_EMAIL))==false||($mailB!=$mail)) {
			$walidation_OK=false;
			$_SESSION['e_mail']="Wprowadzony e-mail jest niepoprawny.";
			header('Location:registrationSite.php');
		}
		return $walidation_OK;
	}
	/*
	public function checkReCaptcha() {
		
		$walidation_OK = true;
		
		$secret_key = '6LdYIiUUAAAAAIoR7jdC29NJzr3oOEcDHPHdW4Bv';
		
		$check_captcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
		
		$answer= json_decode($check_captcha);
		
		if(!($answer->success==true)){
			$walidation_OK=false;
			$_SESSION['e_bot']="Potwierdz, że nie jesteś botem.";
			header('Location:rejestracja.php');
		}
		
		return $walidation_OK;
	}
	*/
	public function checkCountMail($count) {
		$walidation_OK = true;
		
		if($count>0) {
			$walidation_OK=false;
			$_SESSION['e_mail']="Istnieje konto o takim adresie e-mail!";
			header('Location:registrationSite.php');
		}
		return $walidation_OK;
	}
	
	public function checkCountNick($count) {
		$walidation_OK = true;
		
		if($count>0) {
			$walidation_OK=false;
			$_SESSION['e_nick']="Istnieje konto o takim nicku!";
			header('Location:registrationSite.php');
		}
		return $walidation_OK;
	}
 }
 
 ?>