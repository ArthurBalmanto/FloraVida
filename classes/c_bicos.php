<?php 
	class C_Bico{
		
		private $conn;
		private $table_name = "bico";
	 
		public $id_bico;
		public $nome_bico;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                    nome_bico = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_bico);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_bico, nome_bico
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_bico";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>