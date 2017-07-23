<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	
	if(!isset($_SESSION['logIn'])) {
		header('Location:index.php');
		exit();
	}
	
	if((!isset($_SESSION['nameContactCheck']))||(!isset($_SESSION['surnameContactCheck']))) {
		require "searchInDatabase.php";
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
	<link rel="stylesheet" href="css/panelGlowny1.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<meta name="vievport" content="width=device-width,	initial-scale=1.0">
	
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
		
		<div id="search">
			<form action="searchInDatabase.php" method="post">
				<input type="text" placeholder="imię" onfocus="this.placeholder=''" onblur="this.placeholder='imię'" name="nameContact">
				
				<input type="text" placeholder="nazwisko" onfocus="this.placeholder=''" onblur="this.placeholder='nazwisko'" name="surnameContact">
				
				<input type="submit"value="Szukaj">
			</form>
		</div>
		
		<div id="contact">
		
			<div id="emptyBook">
				<?php
				if(isset($_SESSION['isEmpty'])){
					echo $_SESSION['isEmpty'];
					unset($_SESSION['isEmpty']);
				}
				
				if(isset($_SESSION['noContacts'])){
					echo $_SESSION['noContacts'];
					unset($_SESSION['noContacts']);
				}
				?>
			</div>
			
			<?php
				$countContact=0;
				while($countContact<$_SESSION['cContact']){
			?>
	
				<div id="all_user_information">
					<div id="user_photo"><img src="img/user.png" alt="ikona usera" height="250" width="250"></div>
					<div id="contact_information">
					
						<div class="contact_data">
							<?php
							if(isset($_SESSION['cName'])) {
								echo $_SESSION['cName'][$countContact];
								unset($_SESSION['cName'][$countContact]);
							}
							?>
						</div>
						
						<div class="contact_data">
							<?php
							if(isset($_SESSION['cSurname'])) {
								echo $_SESSION['cSurname'][$countContact];
								unset($_SESSION['cSurname'][$countContact]);
							}
							?>
						</div>
						
						<div class="contact_data">
							<?php
							if(isset($_SESSION['cPhoneNumber'])) {
								echo $_SESSION['cPhoneNumber'][$countContact];
								unset($_SESSION['cPhoneNumber'][$countContact]);
							}
							?>
						</div>
						
						<div class="contact_data">
							<?php
							if(isset($_SESSION['cMail'])) {
								echo $_SESSION['cMail'][$countContact];
								unset($_SESSION['cMail'][$countContact]);
							}
							?>
						</div>
						
					</div>
					
					<div id="further_information">
							<?php
							if(isset($_SESSION['cNote'])) {
								echo $_SESSION['cNote'][$countContact];
								unset($_SESSION['cNote'][$countContact]);
							}
							?>
					</div>
					
				</div>
				
			<?php
				$countContact++;
				}
				unset($_SESSION['nameContactCheck']);
				unset($_SESSION['surnameContactCheck']);
			?>
	
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