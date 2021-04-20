<?php 
	class C_Conservacao{
		
		private $conn;
		private $table_name = "status_conservacao";
	 
		public $id_status;
		public $nome_status;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_status = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_status);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_status, nome_status
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_status";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>