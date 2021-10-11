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
	<div class="crud">
    <div class="cont-barra">
        <div class="cont-pesquisa">
            <a href="#">
                <img class="pesquisa-img" src="https://www.imagemhost.com.br/images/2021/10/01/search.png" alt="search.png" border="0">
            </a>
            <input type="text" class="pesquisa-text" placeholder="Faça sua pesquisa">
        </div>
        <div class="cont-usuario">
            <img src="https://www.imagemhost.com.br/images/2021/10/01/icone.png" alt="icone.png" border="0">
            <p class="usuario-text">Administrador</p>
        </div>
    </div>
    <div class="cont-crud">
        <div class="cont-01">
            <span class="title-venda">Venda</span>
                <div class="cont-filter">
                    <div class="filter">
                        <img class="filter-img" src="https://i.ibb.co/6v6P822/filter.png" alt="filter" border="0">
                    </div>
                    <select class="filter-select"></select>
                    
                </div>
        </div>
		
		<form action="insercao.php" 
		      method="GET">
			<label for="id_Venda">
			venda:
			</label>
			<input type="text" name="venda" id="id_Venda">
			<br>
			
			<label for="data_venda">
			data_venda:
			</label>
			<input type="date" name="data_venda" id="data_venda">
			<br>		
			
			<label for="status">
			status:
			</label>
			<input type="txt" name="status" id="status">
			<br>	

			<label for="id_func">
			id_func:
			</label>
			<input type="txt" name="id_func" id="id_func">
			<br>	
			
			<label for="id_Horta">
			id_Horta:
			</label>
			<input type="txt" name="id_Horta" id="id_Horta">
			<br>	

			<label for="status">
			id_Cliente:
			</label>
			<input type="txt" name="id_Cliente" id="id_Cliente">
			<br>	
			
			<input type="submit" value="Ok">
		</form>

<?php 
// efetua inclusao do curso informado em cadatro_curso.html
// criar um função ROW igual do araya na parte de função
	include("../model/funcoes.inc.php");
	
	$id_Venda = $_GET["id_Venda"];
	$data_venda = $_GET["data_venda"];
	$status = $_GET["status"];
	$id_func = $_GET["id_func"];
	$id_Horta = $_GET["id_Horta"];
	$id_Cliente = $_GET["id_Cliente"];

  try {
    $query = "INSERT INTO mh_venda 
	(id_Venda, date_format(dt_inicio,'%Y-%m-%d') as data_venda FROM mh_venda, 'status', id_func, id_Horta, id_Cliente ) 
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

