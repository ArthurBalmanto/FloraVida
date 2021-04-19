<?php 
	class C_Ouvido{
		
		private $conn;
		private $table_name = "ouvidos";
	 
		public $id_ouv;
		public $nome_ouv;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                    nome_ouv = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_ouv);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_ouv, nome_ouv
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_ouv";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>