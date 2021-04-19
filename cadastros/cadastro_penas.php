<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Penas</h1>
			<form action="cadastro_penas.php" method="POST">
				<div>
					<input class="form-control" id="nomepenas" name="nome_penas" type="text" placeholder="Situação das Penas" aria-label="default input example" required >
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
    include_once "classes/c_penas.php";
    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_penas = new C_Pena($db);

		$c_penas->nome_penas = $_POST['nome_penas'];
		
		if($c_penas->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>