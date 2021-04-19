<?php 
	class C_Saude{
		
		private $conn;
		private $table_name = "saude_animal";

		public $id_saude;
		public $id_cfau_cont;
		public $nvl_consciencia;
		public $postura;
		public $empoleiramento;
		public $respiracao;
		public $vocalizacao;
		public $digestorio;
		public $fezes;
		public $bico;
		public $cabeca;
		public $narinas;
		public $ouvindo;
		public $olhos;
		public $palpebras;
		public $penas_corpo;
		public $musculatura;
		public $peso;
		public $g_furcula;
		public $g_axilar;
		public $g_cloacal;
		public $ectoparasitas;
		public $m_oral;
		public $m_palpebral;
		public $pele_corpo;
		public $cav_abdominal;
		public $cloaca;
		public $osso_ma_esq;
		public $osso_ma_dir;
		public $emp_rem_dir;
		public $emp_rem_esq;
		public $cap_voo; 
		public $osso_mp_esq;
		public $osso_mp_dir;
		public $unhas;
		public $emp_cauda;
		public $grau_social;
		public $setorizacao; 
		public $obs;
		
		public function __construct($db){
			$this->conn = $db;
		}
	 
		function criar(){
	  
			$query = "INSERT INTO " 
					    . $this->table_name .
					"	SET	
						id_saude = ?,
						id_cfau_cont = ?,
						nvl_consciencia = ?,
						postura = ?,
						empoleiramento = ?,
						respiracao = ?,
						vocalizacao = ?,
						digestorio = ?,
						fezes = ?,
						bico = ?,
						cabeca = ?,
						narinas = ?,
						ouvindo = ?,
						olhos = ?,
						palpebras = ?,
						penas_corpo = ?,
						musculatura = ?,
						peso = ?,
						g_furcula = ?,
						g_axilar = ?,
						g_cloacal = ?,
						ectoparasitas = ?,
						m_oral = ?,
						m_palpebral = ?,
						pele_corpo = ?,
						cav_abdominal = ?,
						cloaca = ?,
						osso_ma_esq = ?,
						osso_ma_dir = ?,
						emp_rem_dir = ?,
						emp_rem_esq = ?,
						cap_voo = ?, 
						osso_mp_esq = ?,
						osso_mp_dir = ?,
						unhas = ?,
						emp_cauda = ?,
						grau_social = ?,
						setorizacao = ?, 
						obs = ?
					";
	 
			$stmt = $this->conn->prepare($query);
	 
			$stmt->bindParam(1, $this->id_saude);
			$stmt->bindParam(2, $this->id_cfau_cont);
			$stmt->bindParam(3, $this->nvl_consciencia);
			$stmt->bindParam(4, $this->postura);
			$stmt->bindParam(5, $this->empoleiramento);
			$stmt->bindParam(6, $this->respiracao);
			$stmt->bindParam(7, $this->vocalizacao);
			$stmt->bindParam(8, $this->digestorio);
			$stmt->bindParam(9, $this->fezes);
			$stmt->bindParam(10, $this->bico);
			$stmt->bindParam(11, $this->cabeca);
			$stmt->bindParam(12, $this->narinas);
			$stmt->bindParam(13, $this->ouvindo);
			$stmt->bindParam(14, $this->olhos);
			$stmt->bindParam(15, $this->palpebras);
			$stmt->bindParam(16, $this->penas_corpo);
			$stmt->bindParam(17, $this->musculatura);
			$stmt->bindParam(18, $this->peso);
			$stmt->bindParam(19, $this->g_furcula);
			$stmt->bindParam(20, $this->g_axilar);
			$stmt->bindParam(21, $this->g_cloacal);
			$stmt->bindParam(22, $this->ectoparasitas);
			$stmt->bindParam(23, $this->m_oral);
			$stmt->bindParam(24, $this->m_palpebral);
			$stmt->bindParam(25, $this->pele_corpo);
			$stmt->bindParam(26, $this->cav_abdominal);
			$stmt->bindParam(27, $this->cloaca);
			$stmt->bindParam(28, $this->osso_ma_esq);
			$stmt->bindParam(29, $this->osso_ma_dir);
			$stmt->bindParam(30, $this->emp_rem_dir);
			$stmt->bindParam(31, $this->emp_rem_esq);
			$stmt->bindParam(32, $this->cap_voo); 
			$stmt->bindParam(33, $this->osso_mp_esq);
			$stmt->bindParam(34, $this->osso_mp_dir);
			$stmt->bindParam(35, $this->unhas);
			$stmt->bindParam(36, $this->emp_cauda);
			$stmt->bindParam(37, $this->grau_social);
			$stmt->bindParam(38, $this->setorizacao); 
			$stmt->bindParam(39, $this->obs);
			
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