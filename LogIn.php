<?php
	
	class LogIn{
		
		public function findUserInDatebase($email, $password, Datebase $datebase) {
			
			$email = htmlentities($email, ENT_QUOTES, "UTF-8");
			
			$connect = $datebase->getConnect();
			
			if($result = $connect->query(sprintf("SELECT * FROM uzytkownicy WHERE email='%s'", 
				mysqli_real_escape_string($connect, $email)))){
				
				$count_user=$result->num_rows;
					
				if($count_user>0) { 
					
					$row=$result->fetch_assoc();
					
					if(password_verify($password, $row['haslo'])) {
					
						$_SESSION['logIn'] = true;
						
						$_SESSION['id'] = $row['id'];
						$_SESSION['nick'] = $row['nick'];
						$_SESSION['user_name'] = $row['imie'];
						$_SESSION['user_surname'] = $row['nazwisko'];
						$_SESSION['email'] = $row['email'];
						
						unset($_SESSION['error']);
						
						$result->free_result();
						header('Location:mainPanelSite.php');
					}
					else {
						$_SESSION['error']='<span style="color:red">Nieprawidłowy login lub haslo!</span>';
						header("Location: index.php");
					}
				}
				else {
					$_SESSION['error']='<span style="color:red">Nieprawidłowy login lub haslo!</span>';
					header("Location: index.php");
				}
				
				$datebase->closeConnect();
			}
		}
	}
	
?>