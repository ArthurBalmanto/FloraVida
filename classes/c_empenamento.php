<?php 
	class C_Empenamento{
		
		private $conn;
		private $table_name = "empenamento";
	 
		public $id_empe;
		public $nome_empe;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_empe = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_empe);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_empe, nome_empe
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_empe";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>