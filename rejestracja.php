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
	<link rel="stylesheet" href="css/rejestracja.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>

<body>	

	<div id="container">
	
		<div id="logo"><a href=""><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<div id="boxDate">
				
			<div id="newUser">
			
				<form action="zarejestruj.php" method="post">
				
					<div id="signIn">Wprowadź swoje dane: </div>
					
					<input type="text" placeholder="nick" onfocus="this.placeholder=''" onblur="this.placeholder='nick'" name="nick">
						<div class="error">
							<?php
								if(isset($_SESSION['e_nick'])) {
									echo $_SESSION['e_nick'];
									unset($_SESSION['e_nick']);
								}
							?>
						</div>
					<input type="password" placeholder="hasło" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" name="user_password1">
					
						<div class="error">
							<?php
								if(isset($_SESSION['e_password'])) {
									echo $_SESSION['e_password'];
									unset($_SESSION['e_password']);
								}
							?>
						</div>
					
					<input type="password" placeholder="powtórz hasło" onfocus="this.placeholder=''" onblur="this.placeholder='powtórz hasło'" name="user_password2">
					
					<input type="text" placeholder="imię" onfocus="this.placeholder=''" onblur="this.placeholder='imię'" name="user_name">
					
						<div class="error">
							<?php
								if(isset($_SESSION['e_name'])) {
									echo $_SESSION['e_name'];
									unset($_SESSION['e_name']);
								}
							?>
						</div>
					
					<input type="text" placeholder="nazwisko" onfocus="this.placeholder=''" onblur="this.placeholder='nazwisko'" name="user_surname">
					
						<div class="error">
							<?php
								if(isset($_SESSION['e_surname'])) {
									echo $_SESSION['e_surname'];
									unset($_SESSION['e_surname']);
								}
							?>
						</div>
					
					<input type="text" placeholder="e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'" name="mail">
					
						<div class="error">
							<?php
								if(isset($_SESSION['e_mail'])) {
									echo $_SESSION['e_mail'];
									unset($_SESSION['e_mail']);
								}
							?>
						</div>
						<!--
						<div class="g-recaptcha" data-sitekey="6LdYIiUUAAAAAGtRNW6GF4qrPMb22DcWN5BTPM-E"></div>
						
						<div class="error">
							<?php
								if(isset($_SESSION['e_bot'])) {
									echo $_SESSION['e_bot'];
									unset($_SESSION['e_bot']);
								}
							?>
						</div>
						-->
					<input type="submit" value="Utwórz profil">

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