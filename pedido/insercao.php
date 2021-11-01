<!DOCTYPE html>
<!-- inclusao.php -->
<html>
	<head>
	  <title>Cadastro de Vendas</title>
	  <meta charset="utf-8">
	</head>
	<body>
<?php 
// efetua inclusao do curso informado em cadatro_curso.html

  $id_Venda = $_GET["id_Venda"];
  $quantidade = $_GET["quantidade"];
  $id_Produto = $_GET["id_Produto"];
  
  $id_Cliente = $_GET["id_Cliente"];
  
  
  include("../model/conexao.php");


  try {

	$query = "SELECT id_Pedido, quantidade, id_Venda, id_Cliente, id_Produto FROM mh_pedido  ";
  	
	$query = "INSERT INTO mh_pedido
	(id_Pedido, quantidade, id_Venda, id_Cliente, id_Produto) 
	values (:id_Pedido, :quantidade, :id_Venda, :id_Cliente, :id_Produto);";

	$stmt=$conexao->prepare($query);

	
	$stmt->bindParam(":id_Pedido", $id_Pedido, PDO::PARAM_STR);
	$stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_STR);
	$stmt->bindParam(":id_Venda", $id_Venda, PDO::PARAM_STR);
	$stmt->bindParam(":id_Cliente", $id_Cliente, PDO::PARAM_STR);
	$stmt->bindParam(":id_Produto", $id_Produto, PDO::PARAM_INT );
	$stmt->execute();
	echo "Inclusão efetuada com sucesso";


  } catch (PDOException $erro) {
	echo "ERRO:". $erro->getMessage();
  }



?>  
 <br>
 <a href="index.php">Ver Vendas efetuadas</a>
 
 </body>
</html>

