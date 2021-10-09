<?php
    //Header
    include_once 'includes/header.php';
    //conexao com o banco de dados
    include '../model/conexao.php';
    //Alimentacao do select com PDO
    $sql = " SELECT nome FROM mh_produto";
    try {
        $stmt = $conexao -> prepare($sql);
        $stmt -> execute();
        $results = $stmt -> fetchAll();
    }
    catch(Exception $ex){
        echo ($ex -> getMessage());

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<body>
    <div class="row">
        <div class="col s12 m6 push-m3">
                <h3 class="light">Inserir Produto</h3>
                <form>
                        
                        <select id="produto" name="produto">
                            <option>Produto</option>
                            <?php foreach($results as $output) {?>
                            <option><?php echo $output["nome"];?></option>
                            <?php } ?>
                        </select>
                    <br>
                    <button class="btn blue">Inserir</button>
                    <a href="index.php"class="btn red">Cancelar</a>
                </form>
            <br>
            <a  href="" class="btn green">Voltar ao painel de Venda</a>
        </div>
    </div>
</body>
</html>
<?php
//Footer
include_once 'includes\footer.php';
?>
