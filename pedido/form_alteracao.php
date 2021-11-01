<!DOCTYPE html>
<!-- form_alteracao.html -->
<?php
  include("../model/conexao.php");
  include ("../model/funcoes.inc.php");
  $id_Pedido = $_GET["id"];
  $linha = le_pedido($conexao, $id_Pedido);
?>

<html>
	<head>
	  <title>Cadastro de venda</title>
	  <meta charset="utf-8">
	</head>
	<body>
		<h1>Atualizar venda</h1>
		<form action="alteracao.php" 
		      method="GET">
			  
			<input type="hidden" name="id" value="<?php echo $linha["id_Pedido"];?>">
			<label for="id_Pedido">
			quantidade:
			</label>
			<input type="text" name="quantidade" id="quantidade" value="<?php echo $linha["quantidade"];?>">
			<br>
			<label for="id_Venda">
			id_Venda:
			</label>
			<input type="text" name="id_Venda" id="id_Venda" value="<?php echo $linha["id_Venda"];?>">
			<br>
			<label for="id_Cliente">
			id_Cliente:
			</label>
			<input type="txt" name="id_Cliente" id="id_Cliente" value="<?php echo $linha["id_Cliente"];?>">
			<br>
			<label for="id_Produto">
			id_Produto:
			</label>
			<input type="txt" name="id_Produto" id="id_Produto" value="<?php echo $linha["id_Produto"];?>">
			<br>
			
			<input type="submit" value="Ok">
		</form>
	</body>
</html>


