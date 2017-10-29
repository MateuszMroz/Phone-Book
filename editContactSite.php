<?php
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	
	if(!isset($_SESSION['logIn'])) {
		header('Location:index.php');
		exit();
	}
	
	if((!isset($_SESSION['nameContactCheck']))||(!isset($_SESSION['surnameContactCheck']))) {
		require "editContact.php";
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
	<link rel="stylesheet" href="css/editContactStylee.css" type="text/css" />
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
		</div>
		
		<div id="search">
			<form action="editContact.php" method="post">
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
					$IDInformation[$countContact]=$_SESSION['cID'][$countContact];
					$nameInformation[$countContact]=$_SESSION['cName'][$countContact];
					$surnameInformation[$countContact]=$_SESSION['cSurname'][$countContact];
					$numberInformation[$countContact]=$_SESSION['cPhoneNumber'][$countContact];
					$mailInformation[$countContact]=$_SESSION['cMail'][$countContact];
					$noteInformation[$countContact]=$_SESSION['cNote'][$countContact];
			?>
			
			<div id="all_user_information">
				<div id="user_photo"><img src="img/user.png" alt="ikona usera" height="250" width="250"></div>
				<div id="contact_information">
					<form action="editOneContact.php" method="post">
						<input type="text" placeholder="<?php
							if(isset($_SESSION['cName'])) {
								echo $_SESSION['cName'][$countContact];
							}
							?>" 
							onfocus="this.placeholder=''" onblur="this.placeholder='<?php
								echo $_SESSION['cName'][$countContact];
								unset($_SESSION['cName'][$countContact]);
							?>'" <?php echo $nameInformation[$countContact]; ?> name="editName">
							</br>
						
						<input type="text" placeholder="<?php
							if(isset($_SESSION['cSurname'])) {
								echo $_SESSION['cSurname'][$countContact];
							}
							?>" 
							onfocus="this.placeholder=''" onblur="this.placeholder='<?php
								echo $_SESSION['cSurname'][$countContact];
								unset($_SESSION['cSurname'][$countContact]);
							?>'" <?php echo $surnameInformation[$countContact]; ?> name="editSurname">
							</br>
						
						<input type="tel" placeholder="<?php
							if(isset($_SESSION['cPhoneNumber'])) {
								echo $_SESSION['cPhoneNumber'][$countContact];
							}
							?>" 
							onfocus="this.placeholder=''" onblur="this.placeholder='<?php
								echo $_SESSION['cPhoneNumber'][$countContact];
								unset($_SESSION['cPhoneNumber'][$countContact]);
							?>'" <?php echo $numberInformation[$countContact]; ?> name="editPhoneNumber">
							</br>
						
						<input type="email" placeholder="<?php
							if(isset($_SESSION['cMail'])) {
								echo $_SESSION['cMail'][$countContact];
							}
							?>" 
							onfocus="this.placeholder=''" onblur="this.placeholder='<?php
								echo $_SESSION['cMail'][$countContact];
								unset($_SESSION['cMail'][$countContact]);
							?>'" <?php echo $mailInformation[$countContact]; ?> name="editMail">
							</br>
						
						<input type="text" placeholder="<?php
							if(isset($_SESSION['cNote'])) {
								echo $_SESSION['cNote'][$countContact];
							}
							?>" 
							onfocus="this.placeholder=''" onblur="this.placeholder='<?php
								echo $_SESSION['cNote'][$countContact];
								unset($_SESSION['cNote'][$countContact]);
							?>'" <?php echo $noteInformation[$countContact]; ?> name="editNote">
							</br>
					
						<input type="hidden" name="id" value="<?php echo $IDInformation[$countContact]; ?>">
						
						<input type="submit" value="Edytuj kontakt"> </br>
						
					</form>		
				</div>
				<div style="clear:both"></div>
			</div>
			
			<div style="clear:both"></div>
			
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