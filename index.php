<!DOCTYPE html>
<html>
	<head>
		<title>SGAS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, inicial-scale=1.0"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="css/navbar.css" >	
	</head>
	<body>
		<nav id="sidebar">
			<div class="sidebar-header">
				<a class="navbar-brand" href="#"><img src="img/aves.jpg" alt="Logo" ></a>
		  	</div>
		  	<ul class="list-unstyled components">
				<p>Administração</p>
				<!-- Content -->
				<li>
					<a href="/"><i class="fal fa-chart-bar"></i> Indicadores </a>
				</li>
				<li>
					<a href="cadastros/cadastro_principal.php">Cadastro Principal</a>
				</li>
				<li>
					<a href="cadastros/cadastro_saude_animal.php"><i class="far fa-heartbeat"></i> Saúde Animal</a>
				</li>
				<li>
					<a href="listar_animais.php">Listar Animais</a>
				</li>
				<li>
					<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="far fa-dove"></i> Cadastros </a>
					<ul class="collapse list-unstyled" id="homeSubmenu">
						<li>
							<a href="cadastros/cadastro_bico.php">Bico</a>
							<a href="cadastros/cadastro_cabeca.php">Cabeça</a>
							<a href="cadastros/cadastro_cavidade.php">Cavidade</a>
							<a href="cadastros/cadastro_cloaca.php">Cloaca</a>
							<a href="cadastros/cadastro_conservacao.php">Conservação</a>
							<a href="cadastros/cadastro_conciencia.php">Nivel de Consciencia</a>
							<a href="cadastros/cadastro_destinacao.php">Destinação</a>
							<a href="cadastros/cadastro_digestao.php">Digestorio</a>
							<a href="cadastros/cadastro_empenamento.php">Empenamento</a>
							<a href="cadastros/cadastro_empreendimento.php">Empreendimento</a>
							<a href="cadastros/cadastro_fezes.php">Fezes</a>
							<a href="cadastros/cadastro_habito_alimentar.php">Habito Alimentar</a>
							<a href="cadastros/cadastro_mucosa.php">Mucosa</a>
							<a href="cadastros/cadastro_musculatura.php">Musculatura</a>
							<a href="cadastros/cadastro_narina.php">Respiração</a>
							<a href="cadastros/cadastro_obs.php">Observações Processuais</a>
							<a href="cadastros/cadastro_ocorrencia.php">Ocorrencia</a>
							<a href="cadastros/cadastro_olhos.php">Olhos</a>
							<a href="cadastros/cadastro_origem.php">Origem</a>
							<a href="cadastros/cadastro_ossos_ma.php">Ossos MA</a>
							<a href="cadastros/cadastro_ossos_mp.php">Ossos MP</a>
							<a href="cadastros/cadastro_ouvido.php">Audição</a>
							<a href="cadastros/cadastro_palpebras.php">Palpebras</a>
							<a href="cadastros/cadastro_pele_corpo.php">Pele do Corpo</a>
							<a href="cadastros/cadastro_penas.php">Penas</a>
							<a href="cadastros/cadastro_postura.php">Postura</a>
							<a href="cadastros/cadastro_recinto.php">Recinto</a>
							<a href="cadastros/cadastro_respiracao.php">Respiração</a>
							<a href="cadastros/cadastro_setorizao.php">Setorização</a>
							<a href="cadastros/cadastro_sociabilidade.php">Sociabilidade</a>
							<a href="cadastros/cadastro_unhas.php">Unhas</a>
						</li>
					</ul>
				</li> 
				<li>
					<a href="#">Guia do Sistema</a>
				</li>
			</ul>
		</nav>		
	</body>
</html>

<?php

/*	require_once 'HTTP/Request2.php';
	$request = new HTTP_Request2();
	$request->setUrl('https://api.ebird.org/v2/data/obs/KZ/recent'); 
	$request->setUrl('https://api.ebird.org/v2/data/obs/BR/recent/notable');
	$request->setUrl('https://api.ebird.org/v2/data/obs/BR/recent?back=30');
	$request->setMethod(HTTP_Request2::METHOD_GET);
	$request->setConfig(array(
			'follow_redirects' => TRUE
		));
	$key = "fe38i5dbdls3";//atualizar key ela expira todo dia
	$request->setHeader(array(
		'X-eBirdApiToken' => $key
	));
	try {
		$response = $request->send();
		while($response->getStatus()){
			echo $response->getBody()."<br> aqui";
			
		}
		
		
		if ($response->getStatus() ) {
			echo $response->getBody()."<br>-------------<br>";

						
			$response = json_encode($data, JSON_PRETTY_PRINT);			 
					
		}
		else {
			echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
			$response->getReasonPhrase();
		}
	}
	catch(HTTP_Request2_Exception $e) {
		echo "Error: " . $e-> getMessage();
	}
	
	
	
/*
	require_once 'HTTP/Request2.php';
	$request = new HTTP_Request2();
	$request->setUrl('https://api.ebird.org/v2/ref/hotspot/BR');
	$request->setMethod(HTTP_Request2::METHOD_GET);
	$request->setConfig(array(
	  'follow_redirects' => TRUE
	));
	$key = "fe38i5dbdls3";
	$request->setHeader(array(
	  'X-eBirdApiToken' => $key
	));
	try {
	  $response = $request->send();
	  if ($response->getStatus() == 200) {
		echo $response->getBody();
	  }
	  else {
		echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
		$response->getReasonPhrase();
	  }
	}
	catch(HTTP_Request2_Exception $e) {
	  echo 'Error: ' . $e->getMessage();
	}*/
?>