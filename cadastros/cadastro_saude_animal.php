<!DOCTYPE html>
<html>
	<head>
		<title>Cadastro Saude Animal</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inicial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
		<script type="text/javascript" src="../javascript/bootstrap.min.js"></script>
		<script type="test/javascript" src="../javascript/jquery-3.5.1.min.js"></script>
	</head>
	<body>
		<div class="container">
			<!--FORMULÁRIO DE CADASTRO-->
			<form  action="cadastro_saude_animal.php" method="POST" enctype="multipart/form-data">
				
				<div class="form-group">
					<h1 class="display-3 text-muted">Avaliação da Saúde do Animal</h1> 
				</div>

                <div class="form-group col-sm-6"> 
                    <label for="nome_cad">RGHV</label>
                    <?php
                        include_once "../conexao/database.php";
                        include_once "../classes/c_cad_principal.php";

                        $database = new Database();
                        $db = $database->getConnection();

                        $cad_princ = new Cad_Principal($db);
                        $stmt = $cad_princ->ler();
                    
                        // put them in a select drop-down
                        echo "<select class='form-control' name='rghv'>";
                        
                            echo "<option>Selecione Empreendimento</option>";
                            while ($row_princ = $stmt->fetch(PDO::FETCH_ASSOC)){
                                extract($row_princ);
                                echo "<option value=".$id_cfau.">".$rghv." ". $nome_comun." </option>";
                            
                            }
                        echo "</select>";
                    ?>
                </div>
				
				<div class="card" >
					<div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Nivel Consciência:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_nivel_cons.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_cons = new N_Cons ($db);
									$stmt = $c_cons->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='nivel_cons'>";
									
										echo "<option>Situação</option>";
										while ($row_cons = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_cons);
											echo "<option value=".$id_cons.">".$nome_cons." </option>";
										
										}
									echo "</select>";
								?>
							</div>
							<div class="form-group col-sm-6"> 
								<label for="nome_cad">Postura:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_postura.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_post = new C_Postura($db);
									$stmt = $c_post->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='postura'>";
									
										echo "<option>Selecione</option>";
										while ($row_postura= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_postura);
											echo "<option value=".$id_post.">".$nome_post." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Empoleiramento:</label>
								<select name="empoleiramento" class="form-control">
									<option value="#" >Escolher</option>
									<option value="Bom" >Bom</option>
									<option value="Regular" >Regular</option>
									<option value="Ruim" >Ruim</option>
                                    <option value="Não Empoleira" >Não Empoleira</option>
                                    <option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Respiração:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_respiracao.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_respiracao = new C_Respiracao($db);
									$stmt = $c_respiracao->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='respiracao'>";
									
										echo "<option>Selecione</option>";
										while ($row_respiracao= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_respiracao);
											echo "<option value=".$id_resp.">".$nome_resp." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: white;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Vocalização:</label>
								<select name="vocalizacao" class="form-control">
									<option value="#" >Escolher</option>
									<option value="Normal" >Normal</option>
									<option value="Estampagem" >Estampagem</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Digestório:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_digestorio.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_digestorio = new C_Digestao($db);
									$stmt = $c_digestorio->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='digestorio'>";
									
										echo "<option>Selecione</option>";
										while ($row_digestorio = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_digestorio);
											echo "<option value=".$id_diges.">".$nome_diges." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Fezes:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_fezes.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_fezes = new C_Fezes($db);
									$stmt = $c_fezes->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='fezes'>";
									
										echo "<option>Selecione</option>";
										while ($row_fezes = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_fezes);
											echo "<option value=".$id_rec.">".$nome_rec." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Bico:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_bicos.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_bico = new C_Bico($db);
									$stmt = $c_bico->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='bico'>";
									
										echo "<option>Selecione Bico </option>";
										while ($row_bico= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_bico);
											echo "<option value=".$id_bico.">".$nome_bico." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Cabeça/ Face:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_cabeca.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_cabe = new C_Cabeca($db);
									$stmt = $c_cabe->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='cabeca'>";
									
										echo "<option>Selecione</option>";
										while ($row_cabeca= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_cabeca);
											echo "<option value=".$id_cab.">".$nome_cab." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Narinas/ Olfatos:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_narina.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_narina = new C_Narina($db);
									$stmt = $c_narina->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='narina'>";
									
										echo "<option>Situação da Narina</option>";
										while ($row_narina= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_narina);
											echo "<option value=".$id_nar.">".$nome_nar." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Ouvido / Audição:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_ouvidos.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_ouvido = new C_Ouvido($db);
									$stmt = $c_ouvido->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='audicao'>";
									
										echo "<option>Situaçao Ouvidos</option>";
										while ($row_ouvidos= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_ouvidos);
											echo "<option value=".$id_ouv.">".$nome_ouv." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Olhos Visão:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_olhos.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_olho = new C_Olho($db);
									$stmt = $c_olho->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='visao'>";
									
										echo "<option>Situação dos Olhos</option>";
										while ($row_olhos= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_olhos);
											echo "<option value=".$id_olhos.">".$nome_olhos." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Pálpebras:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_palpebras.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_palpebra = new C_Palpebra($db);
									$stmt = $c_palpebra->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='palpebras'>";
									
										echo "<option>Selecione Recinto</option>";
										while ($row_palpebra= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_palpebra);
											echo "<option value=".$id_pal.">".$nome_pal." </option>";

										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Penas do Corpo:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_penas.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_pena = new C_Pena($db);
									$stmt = $c_pena->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='penas_corpo'>";
									
										echo "<option>Situação das Penas</option>";
										while ($row_pena= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_pena);
											echo "<option value=".$id_penas.">".$nome_penas." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Musculatura Quilha do Esterno:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_musculatura.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_muscu = new C_Musculatura($db);
									$stmt = $c_muscu->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='musculatura'>";
									
										echo "<option>Situação da musculatura</option>";
										while ($row_musculatura= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_musculatura);
											echo "<option value=".$id_musc.">".$nome_musc." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Peso:</label>
								<input class="form-control" id="peso" name="peso" type="text" placeholder="Peso"/>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">G. Fúrcula:</label>
								<select name="g_furcula" class="form-control">
									<option value="#" >Situação</option>
									<option value="Ausencia" >Ausencia</option>
									<option value="Indícios" >Indícios</option>
                                    <option value="Acúmulo" >Acúmulo</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">G. Axilar:</label>
								<select name="g_axilar" class="form-control">
                                <option value="#" >Situação</option>
									<option value="Ausencia" >Ausencia</option>
									<option value="Indícios" >Indícios</option>
                                    <option value="Acúmulo" >Acúmulo</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">G. Cloacal:</label>
								<select name="g_cloacal" class="form-control">
                                    <option value="#" >Situação</option>
									<option value="Ausencia" >Ausencia</option>
									<option value="Indícios" >Indícios</option>
                                    <option value="Acúmulo" >Acúmulo</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Ectoparasitas:</label>
								<select name="ectoparasitas" class="form-control">
                                    <option value="#" >Situação</option>
									<option value="Ausentes" >Ausentes</option>
									<option value="Entre as Penas" >Entre as Penas</option>
                                    <option value="Na Raiz da Pena" >Na Raiz da Pena</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Mucosa Oral:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_mucosa.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_mucosa = new C_Mucosa($db);
									$stmt = $c_mucosa->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='muc_oral'>";
									
										echo "<option>Situação da Mucosa</option>";
										while ($row_mucosa = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_mucosa);
											echo "<option value=".$id_muc.">".$nome_muc." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Mucosa Palpebral:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_mucosa.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_mucosa = new C_Mucosa($db);
									$stmt = $c_mucosa->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='muc_palpebral'>";
									
										echo "<option>Situação</option>";
										while ($row_mucosa = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_mucosa);
											echo "<option value=".$id_muc.">".$nome_muc." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Pele Corpo:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_pele_corpo.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_corpo = new P_Corpo($db);
									$stmt = $c_corpo->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='pele_corpo'>";
									
										echo "<option>Situaçao da Pele</option>";
										while ($row_corpo= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_corpo);
											echo "<option value=".$id_pele.">".$nome_pele." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Cavidade Abdominal:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_cavidade.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_cavid = new C_Cavidade($db);
									$stmt = $c_cavid->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='cavidade'>";
									
										echo "<option>Situação Cavidade Abdominal</option>";
										while ($row_cavidade= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_cavidade);
											echo "<option value=".$id_cavi.">".$nome_cavi." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Cloaca:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_cloaca.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_cloaca = new C_Cloaca($db);
									$stmt = $c_cloaca->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='cloaca'>";
									
										echo "<option>Situação</option>";
										while ($row_cloaca = $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_cloaca);
											echo "<option value=".$id_cloa.">".$nome_cloa." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Ossos MA Direiro:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_osso.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_osso = new C_Osso($db);
									$stmt = $c_osso->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='osso_direito'>";
									
										echo "<option>Situação do Osso</option>";
										while ($row_osso= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_osso);
											echo "<option value=".$id_osso.">".$nome_osso." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Ossos MA Esquerdo:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_osso.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_osso = new C_Osso($db);
									$stmt = $c_osso->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='osso_esquerdo'>";
									
										echo "<option>Situação Osso</option>";
										while ($row_osso= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_osso);
											echo "<option value=".$id_osso.">".$nome_osso." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Empenamento Rêmiges Direito:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_empenamento.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_empe = new C_Empenamento($db);
									$stmt = $c_empe->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='empenamento_dir'>";
									
										echo "<option>Situação do Empenamento</option>";
										while ($row_empe= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_empe);
											echo "<option value=".$id_empe.">".$nome_empe." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Empenamento Rêmiges Esquerdo:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_empenamento.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_empe = new C_Empenamento($db);
									$stmt = $c_empe->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='empenamento_esq'>";
									
										echo "<option>Situação do Empenamento</option>";
										while ($row_empe= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_empe);
											echo "<option value=".$id_empe.">".$nome_empe." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Capacidade de Voo:</label>
								<select name="cap_voo" class="form-control">
                                    <option value="#" >Situação do Voo</option>
									<option value="Bom" >Bom</option>
									<option value="Regular" >Regular</option>
                                    <option value="Ruim" >Ruim</option>
									<option value="Não Voa" >Não Voa</option>
									<option value="Nada" >Nada</option>
								</select>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Osso MP Direito:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_ossos_mp.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_ossomp = new C_OssosMP($db);
									$stmt = $c_ossomp->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='ossos_mp_dir'>";
									
										echo "<option>Situação do osso</option>";
										while ($row_ossomp= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_ossomp);
											echo "<option value=".$id_rid_osso_mp.">".$nome_osso_mp." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Osso MP Esquerdo:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_ossos_mp.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_ossomp = new C_OssosMP($db);
									$stmt = $c_ossomp->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='ossos_mp_esq'>";
									
										echo "<option>Situação do osso</option>";
										while ($row_ossomp= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_ossomp);
											echo "<option value=".$id_rid_osso_mp.">".$nome_osso_mp." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Unhas:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_unhas.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_unha = new C_Unha($db);
									$stmt = $c_unha->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='unhas'>";
									
										echo "<option>Situação das Unhas</option>";
										while ($row_unha= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_unha);
											echo "<option value=".$id_unhas.">".$nome_unhas." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Empenamento Retrizes (Cauda):</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_empenamento.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_empe = new C_Empenamento($db);
									$stmt = $c_empe->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='empenamento_cauda'>";
									
										echo "<option>Situação do Empenamento</option>";
										while ($row_empe= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_empe);
											echo "<option value=".$id_empe.">".$nome_empe." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Grau de Sociabilidade - CHEGADA:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_sociabilidade.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_socia = new C_Socia($db);
									$stmt = $c_socia->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='socializacao'>";
									
										echo "<option>Situação de Sociabilidade</option>";
										while ($row_socia= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_socia);
											echo "<option value=".$id_socia.">".$nome_socia." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            <div class="form-group col-sm-6"> 
								<label for="nome_cad">Setorização:</label>
								<?php
									include_once "../conexao/database.php";
									include_once "../classes/c_setorizacao.php";

									$database = new Database();
									$db = $database->getConnection();

									$c_seto = new C_Setorizacao($db);
									$stmt = $c_seto->ler();
								
									// put them in a select drop-down
									echo "<select class='form-control' name='setorizacao'>";
									
										echo "<option>Selecione Setorização</option>";
										while ($row_seto= $stmt->fetch(PDO::FETCH_ASSOC)){
											extract($row_seto);
											echo "<option value=".$id_seto.">".$nome_seto." </option>";
										
										}
									echo "</select>";
								?>
							</div>
                            </div>
                    </div>
                    <div class="card-body" style="background-color: #d9d9d9;">
						<div class="row">
                            <div class="form-group "> 
								<label for="exampleFormControlTextarea1">Observações Gerais:</label>
								<textarea class="form-control col-sm-12" name="obs_gerais" id="" cols="100%" rows="3"></textarea>			
							</div>

						</div>
					
						<div class="row">
						<div class="form-group col-sm-2"></div>
						<div class="form-group col-sm-2">
							<button class="btn btn-success form-control" type="submit" name="Cadastrar" value="Cadastrar">Cadastrar</button> 
						</div>
						<div class="form-group col-sm-2"></div>
						<div class="form-group col-sm-2">
							<a class="btn btn-primary form-control" href="index.php">Voltar</a>
						</div>
						<div class="form-group col-sm-2"></div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>
<?php
	if($_POST){
	
		include_once "../conexao/database.php";
		include_once "../classes/c_saude_animal.php";
		
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_saude = new C_Saude($db);

		$c_saude->id_cfau_cont = $_POST['rghv'];
		$c_saude->nvl_consciencia = $_POST['nivel_cons'];
		$c_saude->postura = $_POST['postura'];
		$c_saude->empoleiramento = $_POST['empoleiramento'];
		$c_saude->respiracao = $_POST['respiracao'];
		$c_saude->vocalizacao = $_POST['vocalizacao'];
		$c_saude->digestorio = $_POST['digestorio'];
		$c_saude->fezes = $_POST['fezes'];
		$c_saude->bico = $_POST['bico'];
		$c_saude->cabeca = $_POST['cabeca'];
		$c_saude->narinas = $_POST['narina'];
		$c_saude->ouvindo = $_POST['audicao'];
		$c_saude->olhos = $_POST['visao'];
		$c_saude->palpebras = $_POST['palpebras'];
		$c_saude->penas_corpo = $_POST['penas_corpo'];
		$c_saude->musculatura = $_POST['musculatura'];
		$c_saude->peso = $_POST['peso'];
		$c_saude->g_furcula = $_POST['g_furcula'];
		$c_saude->g_axilar = $_POST['g_axilar'];
		$c_saude->g_cloacal = $_POST['g_cloacal'];
		$c_saude->ectoparasitas = $_POST['ectoparasitas'];
		$c_saude->m_oral = $_POST['muc_oral'];
		$c_saude->m_palpebra = $_POST['muc_palpebral'];
		$c_saude->pele_corpo = $_POST['pele_corpo'];
		$c_saude->cav_abdominal = $_POST['cavidade'];
		$c_saude->cloaca = $_POST['cloaca'];
		$c_saude->osso_ma_esq = $_POST['osso_esquerdo'];
		$c_saude->osso_ma_dir = $_POST['osso_direito'];
		$c_saude->emp_rem_dir = $_POST['empenamento_dir'];
		$c_saude->emp_rem_esq = $_POST['empenamento_esq'];
		$c_saude->cap_voo = $_POST['cap_voo'];
		$c_saude->osso_mp_esq = $_POST['ossos_mp_esq'];
		$c_saude->osso_mp_dir = $_POST['ossos_mp_dir'];
		$c_saude->unhas = $_POST['unhas'];
		$c_saude->emp_cauda = $_POST['empenamento_cauda'];
		$c_saude->grau_social = $_POST['socializacao'];
		$c_saude->setorizacao = $_POST['setorizacao'];
		$c_saude->obs = $_POST['obs_gerais'];
		
		if($c_saude->criar()){
			echo "<script> alert(' Saude do Animal cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>
			