<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_empreendimento.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Empreendimento</h1>
			<form action="cadastro_empreendimento.php" method="POST" enctype="multipart/form-data">
				<div>
					<input class="form-control" id="empreendimento" name="cad_empreendimento" type="text" placeholder="Empreendimento" aria-label="default input example" required >
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

			$c_empre_ler = new C_Empreendimento($db);
			$stmt = $c_empre_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_empre= $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_empre);
					echo "<tr>";
						echo "<td>{$id_empre}</td>";
						echo "<td>{$nome_empre}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_empre}' class='btn btn-default left-margin'>Atualliza</a>";
							echo "<a delete-id='{$id_empre}' class='delete-object'>Delete</a>";
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
				
		$c_empre= new C_Empreendimento($db);

		$c_empre->nome_empre = $_POST['cad_empreendimento'];
		
		if($c_empre->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>