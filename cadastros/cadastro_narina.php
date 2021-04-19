<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_narina.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro de Respiração</h1>
			<form action="cadastro_narina.php" method="POST">
				<div>
					<input class="form-control" id="nomenarina" name="nome_narina" type="text" placeholder="Situação da narina" aria-label="default input example" required >
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

			$c_narina_ler = new C_Narina($db);
			$stmt = $c_narina_ler->ler();

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
						echo "<td>{$id_nar}</td>";
						echo "<td>{$nome_nar}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_nar}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_nar}' class='delete-object'>Delete</a>";
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
				
		$c_nar = new C_Narina($db);

		$c_nar->nome_nar = $_POST['nome_narina'];
		
		if($c_nar->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>