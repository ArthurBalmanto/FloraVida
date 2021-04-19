<?php 
	class C_Cavidade{
		
		private $conn;
		private $table_name = "cavidade_abdominal";
	 
		public $id_cavi;
		public $nome_cavi;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_cavi = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_cavi);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_cavi, nome_cavi
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_cavi";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>