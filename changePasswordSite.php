<?php
	session_start();
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
	<link rel="stylesheet" href="css/changePasswordStylee.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	
</head>

<body>	

	<div class="container">
	
		<div id="logo"><a href="mainPanelSite.php"><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<div id="boxDate">
			
			<div class="login">
				<form action = "changePassword.php" method="post">
					<div id="signIn">Zmiana hasła: </div>
					<input type="password" placeholder="stare hasło" onfocus="this.placeholder=''" onblur="this.placeholder='stare hasło'" name="old_password"/>
					<div class = "errorChangePassword">
						<?php
							if(isset($_SESSION['e_password_change'])){
								 echo $_SESSION['e_password_change'];
								 unset($_SESSION['e_password_change']);
							}
						?>
					</div>
					<input type="password" placeholder="nowe hasło" onfocus="this.placeholder=''" onblur="this.placeholder='nowe hasło'" name="new_password"/>
					
					<input type="password" placeholder="powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='powtórz hasło'" name="new_password_two"/>
						<div class = "errorChangePassword">
							<?php
								if(isset($_SESSION['e_password'])){
									 echo $_SESSION['e_password'];
									 unset($_SESSION['e_password']);
								}
							?>
						</div>
					<input type="submit"value="Zatwierdz zmiany"/>
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