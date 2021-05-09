<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro Principal Animal</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inicial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
		<script type="test/javascript" src="../javascript/jquery-3.5.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			<!--FORMULÁRIO DE CADASTRO-->
			<form  action="cadastro_principal.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<h1 class="display-3 text-muted">Cadastro Principal Animal </h1> 
				</div>
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">				
						<div class="form-group"> 
							<label for="nome_cad">RGHV:</label>
							<input class="form-control" id="rghv" name="rghv" required="required" type="text" placeholder="RGHV" />
						</div>
					</div>
				</div>
				<br>
				<div class="card" >
					<div class="card-body" style="background-color: #f2f2f2;">
						<div class="row">
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Anilha ECOAVES:</label>
								<input class="form-control" id="anilha_cfau" name="anilha_cfau" required="required" type="text" placeholder="Anilha" />
							</div>
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Anilha Original:</label>
								<input class="form-control" id="anilha_org" name="anilha_org" type="text" placeholder="Anilha Origem" />
							</div>
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Diametro da Anilha:</label>
								<input class="form-control" id="tm_anilha" name="tm_anilha" required="required" type="text" placeholder="Diametro da Anilha" />
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Empreendimento de Entrada:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_empreendimento.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_empre = new C_Empreendimento($db);
									$stmt = $c_empre->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='emp_entrada'>";
									
										echo "<option>Selecione Empreendimento</option>";
										while ($row_empred = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_empred);
											echo "<option value=".$id_empre.">".$nome_empre." </option>";
										
										}
									echo "</select>";
								?>
							</div>
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Recinto:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_recinto.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_recinto = new C_Recinto($db);
									$stmt = $c_recinto->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='recinto'>";
									
										echo "<option>Selecione Recinto</option>";
										while ($row_recinto= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_recinto);
											echo "<option value=".$id_rec.">".$nome_rec." </option>";
										
										}
									echo "</select>";
								?>
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="card" >
					<div class="card-body" style="background-color: #f2f2f2;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Nome Comum:</label>
								<input class="form-control" id="nome_comun" name="nome_comun" required="required" type="text" placeholder="Nome Comum" />
							</div>
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Nome Científico:</label>
								<input class="form-control" id="nome_cientifico" name="nome_cientifico" type="text" placeholder="Nome Científico" />
							</div>
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Familia:</label>
								<input class="form-control" id="familia" name="familia" required="required" type="text" placeholder="Familia" />
							</div>
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Ordem:</label>
								<input class="form-control" id="ordem" name="ordem" required="required" type="text" placeholder="Ordem" />
							</div>
							<div class="form-group col-sm-4"> 
								<label for="nome_cad">Classe:</label>
								<input class="form-control" id="classe" name="classe" required="required" type="text" placeholder="Classe" />
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Ocorrencia:</label>
								<input class="form-control" id="ocorrencia" name="ocorrencia" type="text" placeholder="Ocorrencia" />
							</div>
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Status de Conservação:</label>
								<input class="form-control" id="status_conserv" name="status_conserv" required="required" type="text" placeholder="Status de Conservação"/>
							</div>
						</div>
					</div>
				</div>
				</br>
				<div class="card" >
					<div class="card-body" style="background-color: #f2f2f2;">
						<div class="form-group"> 
							<label for="senha_cad">Habito Alimentar:</label>
							<input class="form-control" id="hbt_alimentar" name="hbt_alimentar" type="text" placeholder="Habito Alimentar"/>
						</div>
					</div>
				</div>
				</br>
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Sexo:</label>
								<select name="sexo" class="form-control">
									<option value="#" >Escolher</option>
									<option value="Macho" >Macho</option>
									<option value="Fêmea" >Fêmea</option>
									<option value="Indeterminado" >Indeterminado</option>
								</select>
							</div>
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Idade:</label>
								<select name="idade" class="form-control">
									<option value="#" >Escolher</option>
									<option value="Ninhego" >Ninhego</option>
									<option value="Jovem" >Jovem</option>
									<option value="Adulto" >Adulto</option>
									<option value="Idoso" >Idoso</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="card" >
					<div class="card-body" style="background-color: #f2f2f2;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Cor da Anilha:</label>
								<input class="form-control" id="cor_anilha" name="cor_anilha" type="text" required="required" placeholder="Cor da Anilha"/>
							</div>
							<div class="form-group col-sm-6">
								<label for="senha_cad">Situação de Origem:</label>
								<input class="form-control" id="sit_origem" name="sit_origem" type="text" required="required" placeholder="Situação de Origem"/>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Boletim de Ocorrencia:</label>
								<input class="form-control" id="b_ocorrencia" name="b_ocorrencia" type="text" required="required" placeholder="Boletim de Ocorrencia"/>
							</div>
							<div class="form-group col-sm-6"> 
								<label for="senha_cad">Cidade de Origem:</label>
								<input class="form-control" id="city_origem" name="city_origem" type="text" required="required" placeholder="Cidade de Origem"/>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group col-sm-6">
						<button class="btn btn-success form-control" type="submit" name="Cadastrar" value="Cadastrar">Cadastrar</button> 
					</div>
					<div class="form-group col-sm-6">
						<a class="btn btn-primary form-control" href="../index.php">Voltar</a>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
	if($_POST){
	
		include_once "../conexao/database.php";
		include_once "../classes/c_cad_principal.php";
		
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$cad_principal = new Cad_Principal($db);
		$today = date('Y-m-d');
		$cad_principal->data_cad = $today;
		$cad_principal->rghv = $_POST['rghv'];
		$cad_principal->anilha_cefau = $_POST['anilha_cfau'];
		$cad_principal->anilha_origem = $_POST['anilha_org'];
		$cad_principal->tamanho_anilha = $_POST['tm_anilha'];
		$cad_principal->emp_entrada = $_POST['emp_entrada'];
		$cad_principal->recinto = $_POST['recinto'];
		$cad_principal->nome_comun = $_POST['nome_comun'];
		$cad_principal->nome_cientifico = $_POST['nome_cientifico'];
		$cad_principal->familia = $_POST['familia'];
		$cad_principal->ordem = $_POST['ordem'];
		$cad_principal->classe = $_POST['classe'];
		$cad_principal->ocorrencia = $_POST['ocorrencia'];
		$cad_principal->status_conservacao = $_POST['status_conserv'];
		$cad_principal->habito_alimentar = $_POST['hbt_alimentar'];
		$cad_principal->sexo = $_POST['sexo'];
		$cad_principal->idade = $_POST['idade'];
		$cad_principal->cor_anilha = $_POST['cor_anilha'];
		$cad_principal->sit_origem = $_POST['sit_origem'];
		$cad_principal->b_ocorrencia = $_POST['b_ocorrencia'];
		$cad_principal->cidade_org = $_POST['city_origem'];
		
		if($cad_principal->criar()){
			echo "<script> alert(' Animal cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>