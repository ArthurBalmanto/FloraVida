<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_digestorio.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Digestao</h1>
			<form action="cadastro_digestao.php" method="POST">
				<div>
					<input class="form-control" id="nomedigestao" name="nome_digestao" type="text" placeholder="Digestao" aria-label="default input example" required >
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
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_diges = new C_Digestao($db);

		$c_diges->nome_diges = $_POST['nome_digestao'];
		
		if($c_diges->criar()){
			echo "<script> alert('Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>