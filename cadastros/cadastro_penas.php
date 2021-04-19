<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_penas.php";
?>
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
		<?php
			$database = new Database();	
			$db = $database->getConnection();

			$c_penas_ler = new C_Pena($db);
			$stmt = $c_penas_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_penas = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_penas);
					echo "<tr>";
						echo "<td>{$id_penas}</td>";
						echo "<td>{$nome_penas}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_penas}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_penas}' class='delete-object'>Delete</a>";
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
				
		$c_penas = new C_Pena($db);

		$c_penas->nome_penas = $_POST['nome_penas'];
		
		if($c_penas->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>