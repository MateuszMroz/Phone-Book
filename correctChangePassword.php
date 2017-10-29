<?php
	session_start();
	
	if(!isset($_SESSION['logIn'])) {
		header('Location:index.php');
		exit();
	}
	
	if(isset($_SESSION['e_password'])) unset($_SESSION['e_password']);
	
	
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
			Hasło zostało zmienione. <a href="mainPanelSite.php">Kliknij</a> żeby przejsć do panelu głownego!
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