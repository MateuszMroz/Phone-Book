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
	<link rel="stylesheet" href="css/kalendarz1.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	<script type="text/javascript" src="js/scriptCalendar.js"></script>
	
</head>

<body>	
	<div id="container">
	
		<div id="logo"><a href="panelGlowny.php"><img src="img/logo.png" alt="logo" height="120" width="345"></a></div>
		
		<div id="info_user">
			Zalogowany: </br> 
			<?php
				echo $_SESSION['imie']." ".$_SESSION['nazwisko']."</br>";
			?>
			<form action="logOut.php">
				<input type="submit"value="Wyloguj">
			</form>
		</div>
		
		<div id="menu">
			<a href="dodawanieKontaktu.php">
				<div class="mainBar">
					<i class="icon-user-plus"></i></br>Dodaj kontakt 	
				</div>
			</a>
			<a href="usuwanieKontaktu.php">
				<div class="mainBar">
					<i class="icon-user-times"></i></br>Usuń kontakt
				</div>
			</a>
			<a href="edycjaKontaktu.php">
				<div class="mainBar">
					<i class="icon-edit"></i></br>Edytuj kontakt
				</div>
			</a>
			<a href="kalendarz.php">
				<div class="mainBar">
					<i class="icon-calendar"></i></br>Kalendarz
				</div>
			</a>
			<a href="logOut.php">
				<div class="mainBar">
					<i class="icon-logout"></i></br>Wyloguj
				</div>
			</a>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="contact">
			<div id="calendar_container">
				<div id="calendar_header">
					<span id="calendar_month_year">
				</div>
				<div id="calendar_dates">
					<div id="dzien"></div>
				</div>
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