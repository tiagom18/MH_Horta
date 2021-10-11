<!DOCTYPE html>
<!-- inclusao.php -->
<html>
	<head>
	  <title>Cadastro de curso - Inclusão</title>
	  <meta charset="utf-8">
	</head>
	<body>
<?php 
// efetua inclusao do curso informado em cadatro_curso.html

  $curso = $_GET["curso"];
  $nr_carga_horaria = $_GET["nr_carga_horaria"];
  $dt_inicio = $_GET["dt_inicio"];
  
  include_once "../inc/conectabd.inc.php";

  try {
	$query = "INSERT INTO tb_curso 
	(ds_curso, nr_carga_horaria, dt_inicio) 
	values (:curso, :nr_carga_horaria, :dt_inicio);";

	$stmt=$conn->prepare($query);

	$stmt->bindParam(":curso", $curso, PDO::PARAM_STR);
	$stmt->bindParam(":nr_carga_horaria", $nr_carga_horaria, PDO::PARAM_INT );
	$stmt->bindParam(":dt_inicio", $dt_inicio, PDO::PARAM_STR);
	$stmt->execute();
	echo "Inclusão efetuada com sucesso";


  } catch (PDOException $e) {
	echo "ERRO:". $e->getMessage();
  }



?>  
 <br>
 <a href="index.php">Ver cursos cadastrados</a>
 
 </body>
</html>

