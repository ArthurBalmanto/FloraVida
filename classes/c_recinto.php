<?php 
	class C_Recinto{
		
		private $conn;
		private $table_name = "recinto";
	 
		public $id_rec;
		public $nome_rec;
        public $area_rec;
        public $tamanho;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_rec = ?,
                        area_rec = ?,
                        tamanho = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_rec);
            $stmt->bindParam(2, $this->area_rec);
            $stmt->bindParam(3, $this->tamanho);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_rec, nome_rec, area_rec, tamanho
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_rec";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>