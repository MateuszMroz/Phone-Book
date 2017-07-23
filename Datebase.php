<?php

class Datebase {
	
	private $host;
	private $db_user;
	private $db_password;
	private $db_name;
	protected $connectToDatabase;
	
	
	public function __construct() {
		
		$this->host = "localhost";
		$this->db_user = "root";
		$this->db_password = "";
		$this->db_name = "ksiazka_telefoniczna";
		
		$this->connectToDatabase = new mysqli($this->host, $this->db_user, $this->db_password, $this->db_name);
		
		mysqli_report(MYSQLI_REPORT_STRICT);
			
		try {
			if(mysqli_connect_errno()) {
				throw new Exception(mysqli_connect_errno());
			}
		}
		catch(Exception $e) {
			echo '<span style="color:red;">Bład serwera!</span>';
			echo '</br> Informacja developerska: '.$e;
		}
	}
	
	public function queryToDatabase($query){
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		$result = $this->connectToDatabase->query($query);
	
		
		try {	
			if(!$result) {
				throw new Exception($this->connectToDatabase->error);
			}
		}
		catch(Exception $e) {
			echo '<span style="color:red;">Bład serwera!</span>';
			echo '</br> Informacja developerska: '.$e;
		}
		
		return $result;
	}
	
	public function insertIntoDatabase($query){
		
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		$result = $this->connectToDatabase->query($query);
		
		try {	
			if(!$result) {
				throw new Exception($this->connectToDatabase->error);
			}
		}
		catch(Exception $e) {
			echo '<span style="color:red;">Bład serwera!</span>';
			echo '</br> Informacja developerska: '.$e;
		}
	}
	
	public function closeConnect() {
		$this->connectToDatabase->close();
	}
	
	public function getConnect() {
		return $this->connectToDatabase;
	}
	
}

?>