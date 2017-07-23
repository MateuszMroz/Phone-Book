<?php
	session_start();
	
	if(isset($_SESSION['logIn'])&&($_SESSION['logIn']==true)) {
		header('Location:panelGlowny.php');
		exit();
	}
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
	<link rel="stylesheet" href="css/index.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	
</head>

<body>	

	<div class="container">
	
		<div id="logo"><a href="panelGlowny.php"><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<a href="rejestracja.php"><div id="reg">Zarejestruj się</div></a>
		
		<div id="boxDate">
			
			<div class="login">
				<form action = "zaloguj.php" method="post">
					<div id="signIn">Logowanie: </div>
					<input type="text" placeholder="e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'" name="mail"/>
					
					<input type="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" name="user_password"/>
					
					<?php
						if(isset($_SESSION['error'])) echo $_SESSION['error'];
					?>
					
					<div id="signAlt"><a href="rejestracja.php">Stworz nowe konto</a></div>
					
					<input type="submit"value="Zaloguj się"/>
				</form>
			</div>
			
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