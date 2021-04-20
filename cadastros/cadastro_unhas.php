<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_unhas.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Unhas</h1>
			<form action="cadastro_unhas.php" method="POST">
				<div>
					<input class="form-control" id="nomeunhas" name="nome_unhas" type="text" placeholder="Situação da Unhas" aria-label="default input example" required >
				</div>
				<br>
				<div>
					<input class="form-control" type="submit" value="Cadastrar"aria-label="default input example">
				</div>
			</form>
			<?php
			$database = new Database();	
			$db = $database->getConnection();

			$c_unha_ler = new C_Unha($db);
			$stmt = $c_unha_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_unha = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_unha);
					echo "<tr>";
						echo "<td>{$id_unhas}</td>";
						echo "<td>{$nome_unhas}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_unhas}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_unhas}' class='delete-object'>Delete</a>";
						echo "</td>";
					echo "</tr>";
				}
				echo"</table>";
			echo "</div>";
		?>
		</div>
		<div>teste apagar</div>
	</body>
</html>
<?php	

    
	if($_POST){
		//conexão com o banco
		$database = new Database();	
		$db = $database->getConnection();
				
		$c_unha = new C_Unha($db);

		$c_unha->nome_unhas = $_POST['nome_unhas'];
		
		if($c_unha->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>