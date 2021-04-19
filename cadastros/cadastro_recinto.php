<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Recinto</h1>
			<form action="cadastro_recinto.php" method="POST">
				<div>
					<input class="form-control" id="nomerecinto" name="nome_recinto" type="text" placeholder="Recinto" aria-label="default input example" required >
				</div>
                <div>
					<input class="form-control" id="arearecinto" name="area_recinto" type="text" placeholder="Area Recinto" aria-label="default input example" required >
				</div>
                <div>
					<input class="form-control" id="tamanhotela" name="tamanho_tela" type="text" placeholder="Tamanho da Tela" aria-label="default input example" required >
				</div>
				<br>
				<div>
					<input class="form-control" type="submit" value="Cadastrar"aria-label="default input example">
				</div>
			</form>
		</div>
	</body>
</html>
<?php	
    include_once "../conexao/database.php";
    include_once "../classes/c_recinto.php";
    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_recinto = new C_Recinto($db);

		$c_recinto->nome_rec = $_POST['nome_recinto'];
        $c_recinto->area_rec = $_POST['area_recinto'];
        $c_recinto->tamanho = $_POST['tamanho_tela'];
		
		if($c_recinto->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>