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


$data_venda = $_GET["datavenda"];
$situacao = $_GET["situacao"];
$id_func = $_GET["idfunc"];
$id_Horta = $_GET["idhorta"];
$id_Cliente = $_GET["idcliente"];
  
  
  include("../model/conexao.php");

  try {
	$query = "INSERT INTO mh_venda
	(datavenda, situacao, id_func, id_Horta, id_Cliente) 
	values (:datavenda, :situacao, :id_func, :id_Horta, :id_Cliente);";

	$stmt=$conexao->prepare($query);

	$stmt->bindParam(":datavenda", $datavenda, PDO::PARAM_STR);
	$stmt->bindParam(":situacao", $situacao, PDO::PARAM_STR);
	$stmt->bindParam(":id_func", $id_func, PDO::PARAM_STR);
	$stmt->bindParam(":id_Horta", $id_Horta, PDO::PARAM_INT );
	$stmt->bindParam(":id_Cliente", $id_Cliente, PDO::PARAM_STR);
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

