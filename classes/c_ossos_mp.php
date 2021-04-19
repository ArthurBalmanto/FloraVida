<?php 
	class C_OssosMP{
		
		private $conn;
		private $table_name = "ossos_mp";
	 
		public $id_osso_mp;
		public $nome_osso_mp;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
					    nome_osso_mp = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->nome_osso_mp);
			
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		function ler(){
			//select all data
			$query = "SELECT
						id_osso_mp, nome_osso_mp
					FROM
						" . $this->table_name . "
					ORDER BY
						nome_osso_mp";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}	
	} 
?>