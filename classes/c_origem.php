<?php 
	class C_Origem{
		
		private $conn;
		private $table_name = "situacao_origem";
	 
		public $id_origem;
		public $nome_origem;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                        nome_origem = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_origem);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
	} 
?>