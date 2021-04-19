<?php 
	class C_Obs{
		
		private $conn;
		private $table_name = "obs_processuais";
	 
		public $id_obs;
		public $nome_obs;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
                    nome_obs = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_obs);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}	
	} 
?>