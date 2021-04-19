<?php 
	class Cad_Principal{
		
		private $conn;
		private $table_name = "cadastro_principal";
	 
        public $id_cfau;
        public $data_cad;
        public $rghv;
        public $anilha_cefau;
        public $anilha_origem;
        public $tamanho_anilha;
        public $emp_entrada;
        public $recinto;
        public $nome_comun;
        public $nome_cientifico;
        public $familia;
        public $ordem;
        public $classe;
        public $ocorrencia;
        public $status_conservacao;
        public $habito_alimentar;
        public $sexo;
        public $idade;
        public $cor_anilha;
        public $sit_origem;
        public $b_ocorrencia; 
        public $cidade_org;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO
						" . $this->table_name . "
					SET
                        data_cad = ?,
                        rghv  = ?,
                        anilha_cefau  = ?,
                        anilha_origem  = ?,
                        tamanho_anilha = ?,
                        emp_entrada  = ?,
                        recinto  = ?,
                        nome_comun  = ?,
                        nome_cientifico = ?,
                        familia = ?,
                        ordem = ?,
                        classe = ?,
                        ocorrencia = ?,
                        status_conservacao = ?,
                        habito_alimentar = ?, 
                        sexo = ?, 
                        idade = ?,
                        cor_anilha = ?,
                        sit_origem = ?,
                        b_ocorrencia = ?,
                        cidade_org = ?
						";
	 
			$stmt = $this->conn->prepare($query);
	 
            $stmt->bindParam(1, $this->data_cad);
            $stmt->bindParam(2, $this->rghv);
            $stmt->bindParam(3, $this->anilha_cefau);
            $stmt->bindParam(4, $this->anilha_origem);
            $stmt->bindParam(5, $this->tamanho_anilha);
            $stmt->bindParam(6, $this->emp_entrada);
            $stmt->bindParam(7, $this->recinto);
            $stmt->bindParam(8, $this->nome_comun);
            $stmt->bindParam(9, $this->nome_cientifico);
            $stmt->bindParam(10, $this->familia);
            $stmt->bindParam(11, $this->ordem);
            $stmt->bindParam(12, $this->classe);
            $stmt->bindParam(13, $this->ocorrencia);
            $stmt->bindParam(14, $this->status_conservacao);
            $stmt->bindParam(15, $this->habito_alimentar);
            $stmt->bindParam(16, $this->sexo);
            $stmt->bindParam(17, $this->idade);
            $stmt->bindParam(18, $this->cor_anilha);
            $stmt->bindParam(19, $this->sit_origem);
            $stmt->bindParam(20, $this->b_ocorrencia);
            $stmt->bindParam(21, $this->cidade_org);
		
			if($stmt->execute()){
				return true;
			}else{
				return false;
			}
		}
		
        function listar($page, $from_record_num, $records_per_page){
 
            $query = "SELECT
                        id_cfau, data_cad, rghv, anilha_cefau, anilha_origem, tamanho_anilha, emp_entrada, recinto, nome_comun, nome_cientifico, familia, ordem, classe, ocorrencia, status_conservacao, habito_alimentar, sexo, idade, cor_anilha, sit_origem, b_ocorrencia, cidade_org
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                        id_cfau ASC
                        LIMIT
                        {$from_record_num}, {$records_per_page}";
         
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
         
            return $stmt;
        }
        public function contarTodos(){
 
            $query = "SELECT id_cfau FROM " . $this->table_name . "";
         
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
         
            $num = $stmt->rowCount();
         
            return $num;
        }
        function ler(){
			//select all data
			$query = "SELECT
						id_cfau, rghv, nome_comun
					FROM
						" . $this->table_name . "
					ORDER BY
                        rghv";  
	 
			$stmt = $this->conn->prepare( $query );
			$stmt->execute();
	 
			return $stmt;
		}		
	} 
?>