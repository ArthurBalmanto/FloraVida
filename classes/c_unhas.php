<?php 
	class C_Unha{
		
		private $conn;
		private $table_name = "unhas";
	 
		public $id_unhas;
		public $nome_unhas;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_unhas = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_unhas);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_unhas, nome_unhas
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_unhas";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>