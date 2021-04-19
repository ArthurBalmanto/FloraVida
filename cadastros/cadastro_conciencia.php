<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_nivel_cons.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro de Nivel de Conciencia</h1>
			<form action="cadastro_conciencia.php" method="POST">
				<div>
					<input class="form-control" id="nomecons" name="nome_cons" type="text" placeholder="Consciência" aria-label="default input example" required >
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

			$c_cons_ler = new N_Cons($db);
			$stmt = $c_cons_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_cons= $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_cons);
					echo "<tr>";
						echo "<td>{$id_cons}</td>";
						echo "<td>{$nome_cons}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_cons}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_cons}' class='delete-object'>Delete</a>";
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
				
		$n_cons = new N_Cons($db);

		$n_cons->nome_cons = $_POST['nome_cons'];
		
		if($n_cons->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>