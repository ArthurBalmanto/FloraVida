<?php
	    include_once "../conexao/database.php";
		include_once "../classes/c_ossos_mp.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<h1>Cadastro Ossos MP</h1>
			<form action="cadastro_ossos_mp.php" method="POST">
				<div>
					<input class="form-control" id="ossos_mp" name="cad_ossos_mp" type="text" placeholder="Ossos MP" aria-label="default input example" required >
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

			$c_ossomp_ler = new C_OssosMP($db);
			$stmt = $c_ossomp_ler->ler();

			echo "<div>";
			echo "<table class='table table-hover table-responsive table-bordered'>";
				echo "<tr>";
					echo "<th>CÓDIGO</th>";
					echo "<th>NOME</th>";
					echo "<th>AÇÃO</th>";
				echo "</tr>";
			
				while ($row_ossomp = $stmt->fetch(PDO::FETCH_ASSOC)){
					extract($row_ossomp);
					echo "<tr>";
						echo "<td>{$id_osso_mp}</td>";
						echo "<td>{$nome_osso_mp}</td>";

						echo "<td>";
							// edit and delete button is here
							echo "<a href='atualiza_produto.php?id={$id_osso_mp}' class='btn btn-default left-margin'>Atualizar</a>";
							echo "<a delete-id='{$id_osso_mp}' class='delete-object'>Delete</a>";
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
				
		$c_osso_mp= new C_OssosMP($db);

		$c_osso_mp->nome_osso_mp = $_POST['cad_ossos_mp'];
		
		if($c_osso_mp->criar()){
			echo "<script> alert(' Cadastrado com sucesso!'); </script>";
			header("Location:../index.php");
		}
		else{
			echo "<script> alert('Não foi possivel cadastrar!')</script>";	
		}
	}
?>