<?php 
	class P_Corpo{
		
		private $conn;
		private $table_name = "pele_corpo";
	 
		public $id_pele;
		public $nome_pele;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_pele = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_pele);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
		function ler(){
			//select all data
			$query = "SELECT
						id_pele, nome_pele
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_pele";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}
	} 
?>