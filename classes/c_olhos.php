<?php 
	class C_Olho{
		
		private $conn;
		private $table_name = "olhos";
	 
		public $id_olhos;
		public $nome_olhos;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_olhos = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_olhos);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
        function listar(){
	  
			$query = "SELECT "."id_olhos, nome_olhos". "FROM"  
					    . $this->table_name .
					"	ORDER BY
                            nome_olhos
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_olhos);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_olhos, nome_olhos
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_olhos";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}
	} 
?>