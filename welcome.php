<?php
	session_start();
	
	if(!isset($_SESSION['correct_registration'])) {
		header('Location:index.php');
		exit();
	}
	else {
		unset($_SESSION['correct_registration']);
	}
	
	//deleting remember value set in form 
	if(isset($_SESSION['reg_nick'])) unset($_SESSION['reg_nick']);
	if(isset($_SESSION['reg_mail'])) unset($_SESSION['reg_mail']);
	if(isset($_SESSION['reg_password_one'])) unset($_SESSION['reg_password_one']);
	if(isset($_SESSION['reg_password_two'])) unset($_SESSION['reg_password_two']);
	if(isset($_SESSION['reg_name'])) unset($_SESSION['reg_name']);
	if(isset($_SESSION['reg_surname'])) unset($_SESSION['reg_surname']);
	
	
	//deleting error registration
	if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
	if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
	if(isset($_SESSION['e_name'])) unset($_SESSION['e_name']);
	if(isset($_SESSION['e_surname'])) unset($_SESSION['e_surname']);
	if(isset($_SESSION['e_mail'])) unset($_SESSION['e_mail']);
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<title>Phone Book</title>
	<meta name="description" content="Książka telefoniczna." />
	<meta name="keywords" content="phone book, książka telefoniczba" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/welcomeStylee.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	
</head>

<body>	

	<div class="container">
	
		<div id="logo"><a href="mainPanelSite.php"><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<div id="boxDate">
			Rejestracja przebiegła pomyślnie. <a href="index.php">Kliknij</a> żeby się zalogować!
		</div>
		
		<div id="mobile">
			<img src="img/mobile.png" alt="mobile" height="150" width="150">
			<div id="overlay">
				<div id="qr">Tutaj bedzie kod QR do pobarnia aplikacji z Google Play</div>
			</div>
		</div>
		
		<div id="footer">
			&copy Książka telefoniczna - Mateusz Mróz.
		</div>
		
	</div>

</body>
</html>