<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_habito_alimentar.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Hábito Alimentar</h1>
			<form action="cadastro_habito_alimentar.php" method="POST">
				<div>
					<input class="form-control" id="habito" name="cad_habito" type="text" placeholder="Habito Alimentar" aria-label="default input example" required >
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

			$c_hab_ler = new C_Habito($db);
			$stmt = $c_hab_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_hab= $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_hab);
					echo "<tr>";
						echo "<td>{$id_hab}</td>";
						echo "<td>{$nome_hab}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_hab}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_hab}' class='delete-object'>Delete</a>";
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
				
		$c_hab= new C_Habito($db);

		$c_hab->nome_hab = $_POST['cad_habito'];
		
		if($c_hab->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>