<?php 
	class C_Ocorrenciq{
		
		private $conn;
		private $table_name = "ocorrencia";
	 
		public $id_oco;
		public $nome_oco;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_oco = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_oco);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
	} 
?>