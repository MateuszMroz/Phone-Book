<?php
	
	class Search {
		
		public function findContact($query, Datebase $datebase){
			
			$resultsQuery=$datebase->queryToDatabase($query);
			$countContact=$resultsQuery->num_rows;
			
			if($countContact>0){
					
				while($row=$resultsQuery->fetch_assoc()){
					$data[] = $row;
				}
				return $data;
			}
			$datebase->closeConnect();
		}	
	}
	
?>