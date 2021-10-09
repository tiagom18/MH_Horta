<?php
    session_start();
    include('../model/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horta Comunitária - Venda</title>
</head>
<body>
    <div class="container">
        <section>
            <div class="side-menu">
                <div class="cont-menu">
                    <div class="cont-logo">
                        <img src="https://www.imagemhost.com.br/images/2021/09/15/logo.png" alt="logo.png" border="0">
                    </div>
                    <div class="cont-nav">
                        <ul class="list">
                            <li class="cont-item">
                                <div>
                                    <button class="btn-item">
                                        <img class="cont-img" src="https://www.imagemhost.com.br/images/2021/09/30/home.png" alt="home.png" border="0">
                                        <p class="item-text">Home</p>
                                    </button>
                                </div>
                            </li>
                            <li class="cont-item">
                                <div>
                                    <button class="btn-item">
                                        <img class="cont-img" src="https://www.imagemhost.com.br/images/2021/09/30/filter_vintage.png" alt="filter_vintage.png" border="0">
                                        <p class="item-text">Horta</p>
                                    </button>
                                </div>
                           </li>
                            <li class="cont-item">
                                <div>
                                    <button id="btn-venda" class="btn-item">
                                        <img class="cont-img" src="https://www.imagemhost.com.br/images/2021/09/30/shopping_cart.png" alt="shopping_cart.png" border="0">
                                        <p class="item-text">Venda</p>
                                    </button>
                                </div>
                            </li>
                            <li class="cont-item">
                                <div>
                                    <button class="btn-item">
                                        <img class="cont-img" src="https://www.imagemhost.com.br/images/2021/09/30/supervisor_account.png" alt="shopping_cart.png" border="0">
                                        <p class="item-text">Cliente</p>
                                    </button>
                                </div>
                            </li>
                            <li class="cont-item">
                                <div>
                                    <button class="btn-item">
                                        <img class="cont-img" src="https://www.imagemhost.com.br/images/2021/09/30/shopping_basket.png" alt="shopping_basket.png" border="0">
                                        <p class="item-text">Produto</p>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="cont-btn">
                        <a href="../actions/logout.php"><button type="submit" class="btn btn-logout">
                            <img class="btn-img" src="https://www.imagemhost.com.br/images/2021/10/01/exit_to_app.png" alt="exit_to_app.png" border="0">
                            <p class="btn-text">Logout</p>
                        </button></a>
                    </div>
                </div>
            </div>
        </session>
    </div>
</body>
</html>