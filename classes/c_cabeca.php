<?php 
	class C_Cabeca{
		
		private $conn;
		private $table_name = "cabeca";
	 
		public $id_cab;
		public $nome_cab;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                    nome_cab = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_cab);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_cab, nome_cab
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_cab";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>