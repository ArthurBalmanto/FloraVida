<?php 
	class C_Palpebra{
		
		private $conn;
		private $table_name = "palpebras";
	 
		public $id_pal;
		public $nome_pal;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_pal = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_pal);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
		function ler(){
			//select all data
			$query = "SELECT
						id_pal, nome_pal
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_pal";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}
	} 
?>