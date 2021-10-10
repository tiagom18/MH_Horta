<?php 
    include("../model/conexao.php");
    include("../model/screen/index.php");
?>
<!DOCTYPE html>
<!-- inclusao.php -->
<html>
	<head>
    <link rel="stylesheet" href="../model/screen/style.css">
	  <title>Cadastrar Venda</title>
	  <meta charset="utf-8">
	</head>
	<body>

<?php 
// efetua inclusao do curso informado em cadatro_curso.html
// criar um função ROW igual do araya na parte de função
$id_Venda = $row["id_Venda"];
$data_venda = $row["data_venda"];
$status = $row["status"];
$id_func = $row["id_func"];
$id_Horta = $row["id_Horta"];
$id_Cliente = $row["id_Cliente"];
  


  try {
    $query = "INSERT INTO mh_venda 
	(id_Venda, date_format(dt_inicio,'%Y-%m-%d') as data_venda FROM mg_venda, 'status', id_func, id_Horta, id_Cliente ) 
	values (:id_Venda, :data_venda, :'status', :id_func, :id_Horta, :id_Cliente);";

	$stmt=$conexao->prepare($query);

	$stmt->bindParam(":id_Venda", $id_Venda, PDO::PARAM_STR);
	$stmt->bindParam(":data_venda", $data_venda, PDO::PARAM_INT );
	$stmt->bindParam(":status", $status, PDO::PARAM_STR);
    $stmt->bindParam(":id_func", $id_func, PDO::PARAM_STR);
    $stmt->bindParam(":id_Horta", $id_Horta, PDO::PARAM_STR);
    $stmt->bindParam(":id_Cliente", $id_Cliente, PDO::PARAM_STR);
	$stmt->execute();
	echo "Inclusão efetuada com sucesso";


  } catch (PDOException $erro) {
	echo "ERRO:". $erro->getMessage();
  }



?>  
 <br>r
 <a href="index.php">Ver Vendas cadastradas</a>
 
 </body>
</html>

