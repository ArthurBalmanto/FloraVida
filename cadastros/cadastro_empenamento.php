<?php
    include_once "../conexao/database.php";
    include_once "../classes/c_empenamento.php";
?>
<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
		 rel="stylesheet" 
		 integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" 
		 crossorigin="anonymous">

		 <link rel="stylesheet" 
		href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
		integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
		crossorigin="anonymous"/>

		<style>
			h2{
				font-weight:bold;
				font-weight: 400;
				margin-top:40px;
				margin-bottom:40px;
				text-align: center; 
			}
			body{
				/* background-color:#f2f2f2; */
			}
		</style>
	</head>
	<body>
		<div class="container card col-sm-8 shadow " 
				style="margin-top: 40px; background-color:#e6e6e6;">
			<h2>Cadastro Empenamento</h2>
			<form action="cadastro_empenamento.php" method="POST">
				<div class="container col-sm-8">
					<input class="form-control" 
					id="empenamento" 
					name="cad_empenamento" 
					type="text" 
					placeholder="Empenamento" 
					aria-label="default input example" 
					required >
				</div>
				<br>
				<div class=" row justify-content-md-center">	
					<div class=" col-sm-3" style="">
						<input class="form-control btn btn-success " 
						type="submit" 
						value="Cadastrar"
						aria-label="default input example">
					</div>
					<div class=" col-sm-3" style="">
						<a class="form-control btn btn-success " 
						href="../index.php"
						aria-label="default input example">Voltar</a>
					</div>
				</div>
			</form>
			<?php
				$database = new Database();	
				$db = $database->getConnection();

				$c_diges_ler = new C_Empenamento($db);
				$stmt = $c_diges_ler->ler();

					echo "<div class='container  col-sm-12' 
								style='margin-top:40px; background-color:#e6e6e6; '>";
					echo "<table class='table table-striped table-responsive table-bordered-8 col-sm-6'
										style='margin-top:30px;'>";
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
								echo "<a href='atualiza_produto.php?id={$id_empe}' class='btn btn-default left-margin'>
								<span style=' color: green;'>
									<i class='fas fa-edit'></i>
								</spam>
								</a>";
								echo "<a delete-id='{$id_empe}' class='delete-object'>
								<span style=' color: green;'>
									<i class='fas fa-trash'></i>
								</spam>
								</a>";
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