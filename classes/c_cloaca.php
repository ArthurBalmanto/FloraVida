<?php 
	class C_Cloaca{
		
		private $conn;
		private $table_name = "cloaca";
	 
		public $id_cloa;
		public $nome_cloa;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_cloa = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_cloa);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_cloa, nome_cloa
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_cloa";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>