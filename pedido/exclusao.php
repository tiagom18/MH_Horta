<!DOCTYPE html>
<!-- cadastro.html -->
<html>
	<head>
	  <title>Cadastro de curso - Exclusão</title>
	  <meta charset="utf-8">
	</head>
	<body><?php //exclusao.php
// efetua a exclusão do curso cujo id seja informado.
  $id_Pedido = $_GET["id"];
  
  include("../model/conexao.php");

  try{
    $query = "delete from mh_pedido where id_Pedido=:id;";
    $stmt = $conexao->prepare($query);
    $stmt->bindParam(":id", $id_Pedido, PDO::PARAM_INT);
    $stmt->execute();
    echo "Exclusão efetuada com sucesso";

  } catch (PDOException $erro) {
	  echo "ERRO:". $erro->getMessage();
  }


  
 ?>  
 <br>
 <a href="index.php">Ver vendas cadastrados</a>
 
 </body>
</html>
