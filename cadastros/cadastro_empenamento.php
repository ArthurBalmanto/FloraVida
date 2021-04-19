<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_empenamento.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Empenamento</h1>
			<form action="cadastro_empenamento.php" method="POST">
				<div>
					<input class="form-control" id="empenamento" name="cad_empenamento" type="text" placeholder="Empenamento" aria-label="default input example" required >
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

			$c_diges_ler = new C_Empenamento($db);
			$stmt = $c_diges_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_empe= $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_empe);
					echo "<tr>";
						echo "<td>{$id_empe}</td>";
						echo "<td>{$nome_empe}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_empe}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_empe}' class='delete-object'>Delete</a>";
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
				
		$c_empe= new C_Empenamento($db);

		$c_empe->nome_empe = $_POST['cad_empenamento'];
		
		if($c_empe->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>