<?php
    include("../model/conexao.php");
    include("../model/screen/index.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horta Comunitária - Venda</title>
</head>
<body>
    <form action="" method="POST">
        <p>Venda</p>
    </form>
    <div id="modal-update" class="modal-container">
        <div class="modal">
            <p>Alterar</p>
            <form>
                <div class="cont-form">
                    <label for="id">ID</label>
                    <input id="id" name="id" type="number" value="">
                </div>
                <div class="cont-form">
                    <label for="id">Produto</label>
                    <input id="produto" name="produto" type="number" value="">
                </div>
            </form>
        </div>
    </div>
</body>
</html>