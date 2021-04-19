<?php 
	class C_Socia{
		
		private $conn;
		private $table_name = "socialidade";
	 
		public $id_socia;
		public $nome_socia;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
						nome_socia = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_socia);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_socia, nome_socia
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_socia";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>