<?php 
	class C_Fezes{
		
		private $conn;
		private $table_name = "fezes";
	 
		public $id_fez;
		public $nome_fez;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                    nome_fez = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_fez);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_fez, nome_fez
					FROM
						" . $this->table_name . "
					ORDER BY
					nome_fez";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>