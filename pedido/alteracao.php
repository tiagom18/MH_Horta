<!DOCTYPE html>
<!-- alteracao.php -->
<html>
	<head>
	  <title>Cadastro de vendas - Alteração</title>
	  <meta charset="utf-8">
	</head>
	<body>
<?php 
// efetua alteração do curso informado em form_alteracao.php
  $id_Venda = $_GET["id_Venda"];
  $quantidade = $_GET["quantidade"];
  $id_Produto = $_GET["id_Produto"];
  $id_Pedido = $_GET["id"];
  $id_Cliente = $_GET["id_Cliente"];
  
  include("../model/conexao.php");

  try{
    $query = "UPDATE mh_pedido SET 
    quantidade = :quantidade,
    id_Produto = :id_Produto,
    id_Venda = :id_Venda,
    id_Cliente = :id_Cliente
    WHERE id_Pedido = :id;";

    $stmt=$conexao->prepare($query);

    
    $stmt->bindParam(":quantidade", $quantidade, PDO::PARAM_INT );
    $stmt->bindParam(":id_Produto", $id_Produto, PDO::PARAM_STR);
    $stmt->bindParam(":id_Venda", $id_Venda, PDO::PARAM_INT);
    $stmt->bindParam(":id", $id_Pedido, PDO::PARAM_STR);
    $stmt->bindParam(":id_Cliente", $id_Cliente, PDO::PARAM_INT );

    $stmt->execute();

    echo "Alteração efetuada com sucesso";

  } catch (PDOException $erro) {
    echo "ERRO:". $erro->getMessage();
  }


?>  
 <br>
 <a href="index.php">Ver cursos cadastrados</a>
 
 </body>
</html>

