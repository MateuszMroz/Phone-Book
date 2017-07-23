<?php

	session_start();
	
	require "ViewContact.php";
	require "Search.php";
	require "Datebase.php";

	class Contact {
	
		private $datebase;
		private $search;
		private $viewContact;
		
		public function findContact($actualUserID, $localization) {
		
		$datebase = new Datebase;
		$search= new Search;
		$viewContact = new viewContact;
		
		$query="SELECT id FROM kontakty WHERE uzytkownikID='$actualUserID'";
				
		$countC = $datebase->queryToDatabase($query);
		$countContact = $countC->num_rows;
		
		if($countContact>0){
			
			if ((isset($_POST['nameContact']) && !empty($_POST['nameContact']))||(isset($_POST['surnameContact']) && !empty($_POST['surnameContact']))) {
				
				$nameContact=$_POST['nameContact'];
				$surnameContact=$_POST['surnameContact'];
				
				$_SESSION['nameContactCheck']=$nameContact;
				$_SESSION['surnameContactCheck']=$surnameContact;
				
				$querySelect = "SELECT * FROM kontakty WHERE uzytkownikID='$actualUserID' AND (imie='$nameContact' OR nazwisko='$surnameContact') ORDER BY nazwisko";
				
				$contacts=$search->findContact($querySelect, $datebase);
				
				if($contacts==0){
					$_SESSION['noContacts'] = "Brak wyników o pdodanych kryteriach. Spróbuj ponownie!";			
				}
				
				$viewContact->showContact($contacts);
					
				header('Location:' . $localization);
			
				}
				
				else if((isset($_POST['nameContact']) && empty($_POST['nameContact']))||(isset($_POST['surnameContact']) && empty($_POST['surnameContact']))) {
					header('Location:' . $localization);
				}
				
				else {
					
					$queryAll = "SELECT * FROM kontakty WHERE uzytkownikID='$actualUserID' ORDER BY nazwisko";
				
					$contacts=$search->findContact($queryAll, $datebase);
				
					$viewContact->showContact($contacts);
					
					$datebase->closeConnect();
				}
				
			}
		else {
			$_SESSION['isEmpty']="Bark kontaktów! Kliknij Dodaj kontakt, żeby wprowadzić swój pierwszy kontakt!";
			$datebase->closeConnect();
		}
	}
}

?>