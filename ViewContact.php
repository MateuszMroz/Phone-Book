<?php
	
	session_start();
	
	class ViewContact {
		
		public function showContact($contact) {
			//c->contact
			$countContacts = 0;
			
			$arrID= array();
			$_SESSION['cID']=$arrID;
			
			$arrNames= array();
			$_SESSION['cName']=$arrNames;
			
			$arrSurnames= array();
			$_SESSION['cSurname']=$arrSurnames;
			
			$arrPhone= array();
			$_SESSION['cPhoneNumber']=$arrPhone;
			
			$arrMail= array();
			$_SESSION['cMail']=$arrMail;
			
			$arrNote= array();
			$_SESSION['cNote']=$arrNote;
			
			//if($contact==0){
			//	header('Location:panelGlowny.php');
			//}
			
			foreach($contact as $data) {
				
				$_SESSION['cID'][$countContacts]=$data['id'];
				$_SESSION['cName'][$countContacts]=$data['imie'];
				$_SESSION['cSurname'][$countContacts]=$data['nazwisko'];
				$_SESSION['cPhoneNumber'][$countContacts]=$data['numer_telefonu'];
				$_SESSION['cMail'][$countContacts]=$data['mail'];
				$_SESSION['cNote'][$countContacts]=$data['notatka'];

				$countContacts++;
			}
		
			$_SESSION['cContact']=$countContacts;
		}
		
	}
	
?>