<!DOCTYPE html>
<!-- form_alteracao.html -->
<?php
  include "../inc/conectabd.inc.php";
  include "../inc/funcoes.inc.php";
  $id = $_GET["id"];
  $linha = le_curso($conn, $id);
?>

<html>
	<head>
	  <title>Cadastro de curso</title>
	  <meta charset="utf-8">
	</head>
	<body>
		<h1>Atualizar curso</h1>
		<form action="alteracao.php" 
		      method="GET">
			  
			<input type="hidden" name="id" value="<?php echo $linha["id_curso"];?>">
			<label for="ds_curso">
			Curso:
			</label>
			<input type="text" name="curso" id="ds_curso" value="<?php echo $linha["ds_curso"];?>">
			<br>
			<label for="id_nr_carga_horaria">
			Carga Horária:
			</label>
			<input type="text" name="nr_carga_horaria" id="id_nr_carga_horaria" value="<?php echo $linha["nr_carga_horaria"];?>">
			<br>
			<label for="id_dt_inicio">
			Data Início:
			</label>
			<input type="date" name="dt_inicio" id="id_dt_inicio" value="<?php echo $linha["dt_inicio"];?>">
			<br>
			<input type="submit" value="Ok">
		</form>
	</body>
</html>


