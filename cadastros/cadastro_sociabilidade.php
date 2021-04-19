<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Grau de Sociabilidade</h1>
			<form action="cadastro_fezes.php" method="POST">
				<div>
					<input class="form-control" id="nomesocia" name="nome_socia" type="text" placeholder="Sociabilidade" aria-label="default input example" required >
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
    include_once "conexao/database.php";
    include_once "classes/c_sociabilidade.php";
    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_socia = new C_Socia($db);

		$c_socia->nome_socia = $_POST['nome_socia'];
		
		if($c_socia->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>