<?php 
	class C_Musculatura{
		
		private $conn;
		private $table_name = "musculatura";
	 
		public $id_musc;
		public $nome_musc;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_musc = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_musc);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_musc, nome_musc
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_musc";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>