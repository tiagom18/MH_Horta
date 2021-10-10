<?php
    include("../model/conexao.php");
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
                    <a href="inserir.php" class="btn-add" role="button"></a>
                </div>
        </div>
        <div class="cont-02">
            <table class="cont-table">
                <thead>
                    <th>
                        <label class="conectado">
                            <input type="checkbox" value="conectado">
                            <span class="checkmark"></span>
                        </label>
                    </th>
                    <th class="txt-id">ID</th>
                    <th class="txt">Data</th>
                    <th class="txt">Status</th>
                    <th class="txt">Funcionario</th>
                    <th class="txt">ID_horta</th>
                    <th class="txt">ID_Cliente</th>
                    <th class="txt-actions">Actions</th>
                </thead>
                <tbody>
                <?php
                    try{
                        $query = "SELECT * FROM mh_venda";

                        $stmt = $conexao->prepare($query);
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $id_Venda = $row["id_Venda"];
                            $data_venda = $row["data_venda"];
                            $status = $row["status"];
                            $id_func = $row["id_func"];
                            $id_Horta = $row["id_Horta"];
                            $id_Cliente = $row["id_Cliente"];
                            
                            echo "<tr>";
                            echo "<td> $id_Venda</td>";
                            echo "<td> $data_venda</td>";
                            echo "<td> $status</td>";
                            echo "<td> $id_func</td>";
                            echo "<td> $id_Horta </td>";
                            echo "<td> $id_Cliente</td>";
                  
                            echo '<td><a href="exclusao.php?id='. $row["id_Venda"] . '">Excluir</a></td>';
                            echo '<td><a href="form_alteracao.php?id='. $row["id_Venda"] . '">Alterar</a></td>';
                            echo "</tr>";
                        }
                    } catch (PDOException $erro){
                        echo 'Error: '.$erro->getMessage();
                         }
                    
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>