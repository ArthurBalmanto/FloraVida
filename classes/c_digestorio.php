<?php 
	class C_Digestao{
		
		private $conn;
		private $table_name = "digestorio";
	 
		public $id_diges;
		public $nome_diges;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_diges = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_diges);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_post, nome_post
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_post";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>