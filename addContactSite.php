<?php
	session_start();
	
	if(!isset($_SESSION['logIn'])) {
		header('Location:index.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>

	<meta charset="utf-8" />
	<title>Phone Book-main site!</title>
	<meta name="description" content="Książka telefoniczna." />
	<meta name="keywords" content="phone book, książka telefoniczba" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
	<link rel="stylesheet" href="css/addContactStylee.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello1.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	
</head>

<body>	
	<div id="container">
	
		<div id="logo"><a href="mainPanelSite.php"><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<div id="info_user">
			Zalogowany: </br> 
			<?php
				echo $_SESSION['user_name']." ".$_SESSION['user_surname']."</br>"
			?>
			<form action="logOut.php">
				<input type="submit"value="Wyloguj">
			</form>
		</div>
		
		<div id="menu">
			<a href="addContactSite.php">
				<div class="mainBar">
					<i class="icon-user-plus"></i></br>Dodaj kontakt 	
				</div>
			</a>
			<a href="removeContactSite.php">
				<div class="mainBar">
					<i class="icon-user-times"></i></br>Usuń kontakt
				</div>
			</a>
			<a href="editContactSite.php">
				<div class="mainBar">
					<i class="icon-edit"></i></br>Edytuj kontakt
				</div>
			</a>
			<a href="calendarSite.php">
				<div class="mainBar">
					<i class="icon-calendar"></i></br>Kalendarz
				</div>
			</a>
			<a href="changePasswordSite.php">
				<div class="mainBar">
					<i class="icon-cog"></i></br>Zmień hasło
				</div>
			</a>
			<div style = "clear: both;"></div>
		</div>
	
		<div id="contact">
			<div id="all_user_information">
				<div id="user_photo"><img src="img/user.png" alt="ikona usera" height="250" width="250"></div>
				<div id="contact_information">
					<form action="addContact.php" method="post">
					
						<input type="text" placeholder="imię" onfocus="this.placeholder=''" onblur="this.placeholder='imię'" name="name">
							</br>
						<input type="text" placeholder="nazwisko" onfocus="this.placeholder=''" onblur="this.placeholder='nazwisko'" name="surname">
							</br>
						<input type="tel" placeholder="numer telefonu" onfocus="this.placeholder=''" onblur="this.placeholder='numer telefonu'" name="phoneNumber">
							</br>
						<input type="email" placeholder="e-mail" onfocus="this.placeholder=''" onblur="this.placeholder='e-mail'" name="mail">
							</br>
						<input type="text" placeholder="notatka" onfocus="this.placeholder=''" onblur="this.placeholder='notatka'" name="note">
							</br>
						<input type="submit" value="Dodaj kontakt"></br>
							
					</form>
				</div>
				<div style="clear:both"></div>
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