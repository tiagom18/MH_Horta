<?php
    include("./../model/conexao.php");
    include("../model/screen/index.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../model/screen/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda</title>
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
                    <a href="insercao.php" class="btn-add" role="button"></a>
                </div>
        </div>
 
        <?php
        try{
          // lista vendas já cadastrados
         
      $query = "SELECT a.id_Venda, b.nome, c.id_Horta, a.id_func, a.situacao, a.data_venda FROM mh_venda as a INNER JOIN mh_cliente as b on a.id_Cliente = b.id_Cliente INNER JOIN mh_horta as c on a.id_Horta = c.id_Horta; ";

  	$stmt = $conexao->prepare($query);
 
	  $stmt->execute();

	  echo "<table border='1'>";
	  echo "<tr>
	          <th>item</th>
			  <th>quantidade</th>
			  <th>id_venda</th>
			  <th>clinte</th>
              <th>ID produto</th>
            
			  <th colspan=\"2\">Ações</th>
			</tr>";
	  // busca os dados lidos do banco de dados
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_Pedido = $row["id_Pedido"];
        $quantidade = $row["quantidade"];
        $id_Venda = $row["id_Venda"];
        $id_Cliente = $row["id_Cliente"];
        $id_Produto = $row["id_Produto"];
		  
          echo "<td> $id_Pedido</td>";
          echo "<td> $quantidade</td>";
          echo "<td> $id_Venda</td>";
          echo "<td> $id_Cliente</td>";
          echo "<td> $id_Produto </td>";
          
		    
		  // cria link para EXCLUSAO do respectivo id_curso
		  echo '<td><a href="exclusao.php?id='. $row["id_Pedido"] . '">Excluir</a></td>';
		  // cria link para ALTERACAO do respectivo id_curso
		  echo '<td><a href="form_alteracao.php?id='. $row["id_Pedido"] . '">Alterar</a></td>';
    
		  echo "</tr>";
	  }
	  echo "</table>";
    }catch (PDOException $erro){
	echo 'Error: '.$erro->getMessage();
        }


?>  
	<br>
	<p><a href="form_insercao.html">Cadastrar nova Venda</a></p>
	<p><a href="../venda/index.php">Retornar para Menu Principal</a></p>
	</body>
        
      
       
                    
               
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>