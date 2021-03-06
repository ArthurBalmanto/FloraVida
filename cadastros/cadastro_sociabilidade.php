<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_sociabilidade.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Grau de Sociabilidade</h1>
			<form action="cadastro_sociabilidade.php" method="POST">
				<div>
					<input class="form-control" id="nomesocia" name="nome_socia" type="text" placeholder="Sociabilidade" aria-label="default input example" required >
				</div>
				<br>
				<div>
					<input class="form-control" type="submit" value="Cadastrar"aria-label="default input example">
				</div>
			</form>
			<?php
			$database = new Database();	
			$db = $database->getConnection();

			$c_socia_ler = new C_Socia($db);
			$stmt = $c_socia_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_social = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_social);
					echo "<tr>";
						echo "<td>{$id_socia}</td>";
						echo "<td>{$nome_socia}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_socia}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_socia}' class='delete-object'>Delete</a>";
						echo "</td>";
					echo "</tr>";
				}
				echo"</table>";
			echo "</div>";
		?>
		</div>
	</body>
</html>
<?php	

    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_socia = new C_Socia($db);

		$c_socia->nome_socia = $_POST['nome_socia'];
		
		if($c_socia->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>