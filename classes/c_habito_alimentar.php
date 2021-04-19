<?php 
	class C_Habito{
		
		private $conn;
		private $table_name = "habito_alimentar";
	 
		public $id_hab;
		public $nome_hab;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_hab = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_hab);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
	} 
?>