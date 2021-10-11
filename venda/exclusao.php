<!DOCTYPE html>
<!-- cadastro.html -->
<html>
	<head>
	  <title>Cadastro de curso - Exclusão</title>
	  <meta charset="utf-8">
	</head>
	<body><?php //exclusao.php
// efetua a exclusão do curso cujo id seja informado.
  $id = $_GET["id"];
  
  include_once "../inc/conectabd.inc.php";

  try{
    $query = "delete from tb_curso where id_curso=:id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    echo "Exclusão efetuada com sucesso";

  } catch (PDOException $e) {
	  echo "ERRO:". $e->getMessage();
  }


  
 ?>  
 <br>
 <a href="index.php">Ver cursos cadastrados</a>
 
 </body>
</html>
