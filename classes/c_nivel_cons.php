<?php 
	class N_Cons{
		
		private $conn;
		private $table_name = "nivel_consciencia";
	 
		public $id_cons;
		public $nome_cons;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					. $this->table_name .
					"	SET	
					nome_cons = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_cons);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_cons, nome_cons
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_cons";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}
		
	} 
?>