<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_fezes.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Fezes</h1>
			<form action="cadastro_fezes.php" method="POST">
				<div>
					<input class="form-control" id="nomefezes" name="nome_fezes" type="text" placeholder="Tipos de Fezes" aria-label="default input example" required >
				</div>
				<br>
				<div>
					<input class="form-control" type="submit" value="Cadastrar"aria-label="default input example">
				</div>
			</form>
		</div>
		<?php
			$database = new Database();	
			$db = $database->getConnection();

			$c_feze_ler = new C_Fezes($db);
			$stmt = $c_feze_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_feze= $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_feze);
					echo "<tr>";
						echo "<td>{$id_fez}</td>";
						echo "<td>{$nome_fez}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_fez}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_fez}' class='delete-object'>Delete</a>";
						echo "</td>";
					echo "</tr>";
				}
				echo"</table>";
			echo "</div>";
		?>
	</body>
</html>
<?php	

    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_fezes = new C_Fezes($db);

		$c_fezes->nome_fez = $_POST['nome_fezes'];
		
		if($c_fezes->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>