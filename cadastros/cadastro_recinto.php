<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_recinto.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Recinto</h1>
			<form action="cadastro_recinto.php" method="POST">
				<div>
					<input class="form-control" id="nomerecinto" name="nome_recinto" type="text" placeholder="Recinto" aria-label="default input example" required >
				</div>
                <div>
					<input class="form-control" id="arearecinto" name="area_recinto" type="text" placeholder="Area Recinto" aria-label="default input example" required >
				</div>
                <div>
					<input class="form-control" id="tamanhotela" name="tamanho_tela" type="text" placeholder="Tamanho da Tela" aria-label="default input example" required >
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

			$c_recinto_ler = new C_Recinto($db);
			$stmt = $c_recinto_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AREA</th>";
					echo "<th>TAMANHO</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_recinto = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_recinto);
					echo "<tr>";
						echo "<td>{$id_rec}</td>";
						echo "<td>{$nome_rec}</td>";
						echo "<td>{$area_rec}</td>";
						echo "<td>{$tamanho}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_rec}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_rec}' class='delete-object'>Delete</a>";
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
				
		$c_recinto = new C_Recinto($db);

		$c_recinto->nome_rec = $_POST['nome_recinto'];
        $c_recinto->area_rec = $_POST['area_recinto'];
        $c_recinto->tamanho = $_POST['tamanho_tela'];
		
		if($c_recinto->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>