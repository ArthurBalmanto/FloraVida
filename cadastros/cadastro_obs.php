<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_obs.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Observações Processuais</h1>
			<form action="cadastro_obs.php" method="POST">
				<div>
					<input class="form-control" id="nomeobs" name="nome_obs" type="text" placeholder="Observações Processuais" aria-label="default input example" required >
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

			$c_obs_ler = new C_Obs($db);
			$stmt = $c_obs_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_narina = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_narina);
					echo "<tr>";
						echo "<td>{$id_obs}</td>";
						echo "<td>{$nome_obs}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_obs}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_obs}' class='delete-object'>Delete</a>";
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
				
		$c_obser = new C_Obs($db);

		$c_obser->nome_obs = $_POST['nome_obs'];
		
		if($c_obser->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>