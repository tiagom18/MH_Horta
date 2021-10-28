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
    <!--inicio - barra superior-->
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
    <!--fim - barra superior-->
    <div class="cont-crud">
        <div class="cont-01">
            <span class="title-venda">Pedido</span>
                <div class="cont-filter">
                    <div class="filter">
                        <img class="filter-img" src="https://i.ibb.co/6v6P822/filter.png" alt="filter" border="0">
                    </div>
                    <select class="filter-select"></select>
                    <button class="btn-add"></button>
                </div>
        </div>
        <div class="cont-02">
            <table class="cont-table">
                <thead>
                    <th class="txt-id">ID</th>
                    <th class="txt">Produto</th>
                    <th class="txt">Quantidade</th>
                    <th class="txt">Valor Un</th>
                    <th class="txt">Valor Total</th>
                    <th class="txt-actions">Actions</th>
                </thead>
                <tbody>
                    <th></th>
                    <?php
                        try {
                            $stmt = $conexao->prepare("SELECT * FROM mh_pedido");
                            if ($stmt->execute()) {
                                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                                    ?><tr>
                                        <td><?php echo $rs->quantidade; ?></td>
                                        <td><?php echo $rs->id_Produto; ?></td>
                                        <td><center>
                                        <a href="?act=upd&id=<?php echo $rs->id_Pedido; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                        <a href="?act=del&id=<?php echo $rs->id_Pedido; ?>" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-remove"></span> Excluir</a>
                                        </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "Erro: Não foi possível recuperar os dados do banco de dados";
                            }
                        } catch (PDOException $erro) {
                            echo "Erro: " . $erro->getMessage();
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <div class="cont-04">
        <?php
        try{
          // lista vendas já cadastrados
         
      $query = "SELECT mh_venda.id_Venda, 
	date_format(data_venda,'%Y-%m-%d') as data_venda, mh_venda.situacao, mh_venda.id_func, mh_venda.id_Horta, mh_venda.id_Cliente FROM mh_venda  ";

  	$stmt = $conexao->prepare($query);
 
	  $stmt->execute();

	  echo "<table border='1'>";
	  echo "<tr>
	          <th>id</th>
			  <th>Produto</th>
              <th>Quantidade</th>
              <th>Valor Un</th>
              <th>Valor Total</th>
			 
			  <th colspan=\"2\">Ações</th>
			</tr>";
	  // busca os dados lidos do banco de dados
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_Venda = $row["id_Venda"];
        
		  
          echo "<td> $id_Venda</td>";
         
		    
		  // cria link para EXCLUSAO do respectivo id_curso
		  echo '<td><a href="exclusao.php?id='. $row["id_Venda"] . '">Excluir</a></td>';
		  // cria link para ALTERACAO do respectivo id_curso
		  echo '<td><a href="form_alteracao.php?id='. $row["id_Venda"] . '">Alterar</a></td>';
		  echo "</tr>";
	  }
	  echo "</table>";
    }catch (PDOException $erro){
	echo 'Error: '.$erro->getMessage();
        }


?>  
        </div>
    
    
    
                        <!--Apresentando as opções em forma de dropbox
                        <label for="id">Produto</label>
                        <select id="produto" name="produto">
                            <option>Produto</option>
                            <?php foreach($results as $output) {?>
                            <option><?php echo $output["nome"];?></option>
                            <?php } ?>
                        </select>
                        <hr>
                        <button class="">Inserir</button>
                        <button href="index.php"class="">Cancelar</button>
                    </div>
                        -->
</body>
</html>