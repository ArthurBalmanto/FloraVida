<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_setorizacao.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Setorização</h1>
			<form action="cadastro_setorizacao.php" method="POST">
				<div>
					<input class="form-control" id="setorizacao" name="cad_setorizacao" type="text" placeholder="Setorização" aria-label="default input example" required >
				</div>
				<br>
				<div>
					<input class="form-control" type="submit" value="Cadastrar"aria-label="default input example">
				</div>
			</form>
			<?php
			$database = new Database();	
			$db = $database->getConnection();

			$c_setorizacao_ler = new C_Setorizacao($db);
			$stmt = $c_setorizacao_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_setorizacao = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_setorizacao);
					echo "<tr>";
						echo "<td>{$id_seto}</td>";
						echo "<td>{$nome_seto}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_seto}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_seto}' class='delete-object'>Delete</a>";
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
				
		$c_seto = new C_Setorizacao($db);

		$c_seto->nome_seto = $_POST['cad_setorizacao'];
		
		if($c_seto->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>