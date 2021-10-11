<!DOCTYPE html>
<!-- alteracao.php -->
<html>
	<head>
	  <title>Cadastro de curso - Alteração</title>
	  <meta charset="utf-8">
	</head>
	<body>
<?php 
// efetua alteração do curso informado em form_alteracao.php
  $id = $_GET["id"];
  $curso = $_GET["curso"];
  $nr_carga_horaria = $_GET["nr_carga_horaria"];
  $dt_inicio = $_GET["dt_inicio"];
  
  include_once "../inc/conectabd.inc.php";

  try{
    $query = "UPDATE tb_curso 
    SET ds_curso = :curso,
    nr_carga_horaria = :nr_carga_horaria,
    dt_inicio = :dt_inicio
    WHERE id_curso = :id;";

    $stmt=$conn->prepare($query);

    $stmt->bindParam(":curso", $curso, PDO::PARAM_STR);
    $stmt->bindParam(":nr_carga_horaria", $nr_carga_horaria, PDO::PARAM_INT );
    $stmt->bindParam(":dt_inicio", $dt_inicio, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    echo "Alteração efetuada com sucesso";

  } catch (PDOException $e) {
    echo "ERRO:". $e->getMessage();
  }


?>  
 <br>
 <a href="index.php">Ver cursos cadastrados</a>
 
 </body>
</html>

