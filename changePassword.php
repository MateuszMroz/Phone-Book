<?php
	require "Datebase.php";	
	session_start();
	
	
	$userID = $_SESSION['id'];
	$oldPassword = $_POST['old_password'];
	$newPassword = $_POST['new_password'];
	$newPasswordTwo = $_POST['new_password_two'];
	

	$datebase = new Datebase();
	
	if($result = $datebase->queryToDatabase("SELECT * FROM uzytkownicy WHERE id='$userID'")){
		$count_user = $result->num_rows;
		if($count_user > 0) {
			$row=$result->fetch_assoc(); 
			
			if(password_verify($oldPassword, $row['haslo'])){
				$walidation_OK=true;
					
					if($newPassword!=$newPasswordTwo) {
						$walidation_OK=false;
						$_SESSION['e_password']="Hasła są różne!";
						header('Location:changePasswordSite.php');
					}
					
					else if((strlen($newPassword)<8)||(strlen($newPasswordTwo)>20)) {
						$walidation_OK=false;
						$_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
						header('Location:changePasswordSite.php');
					}
					
					if($walidation_OK) {
						
						$newHashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
						
						$query= "UPDATE uzytkownicy SET haslo='$newHashPassword' WHERE id='$userID'";
						$datebase->queryToDatabase($query);
						
						header('Location:correctChangePassword.php');
					}
	
			}
			else {
				$_SESSION['e_password_change'] = "Podane uprzednio hasło jest błędne. Proszę spróbować ponownie!";
				header('Location:changePasswordSite.php');
			}
		}
	}
	else {
		$_SESSION['e_password_change'] = "Błąd, proszę spróbować ponownie później.";
	}
	
?>