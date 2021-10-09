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
                            <button class="btn-add"></button>
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
                                <th class="txt">Nome</th>
                                <th class="txt">E-mail</th>
                                <th class="txt">Celular</th>
                                <th class="txt-actions">Actions</th>
                            </thead>
                        </table>
                    </div>
                    <div class="cont-04"></div>
                </div>
            <div id="modal-update" class="cont-modal">
                <div class="modal">
                    <button id="exit" class="btn-exit">
                            <img class="exit-img" src="https://i.postimg.cc/8zY4r6HD/close.png" alt="exit" border="0">
                        </button>
                    <div class="cont-info">
                        <span class="txt-form">Alterar</span>
                        <hr>
                        <form>
                            <div class="form-id">
                                <label for="id">ID</label>
                                <input id="id" class="input-id" name="id" type="number" value="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function openModal(modalID) {
                    const modal = document.getElementById(modalID);
                    if(modal) {
                        modal.classList.add('mostrar');
                        modal.addEventListener('click', (event) => {
                            if(event.target.id == modalID || event.target.className == 'exit-img') {
                                modal.classList.remove('mostrar');
                            }
                        })
                    }
                }

                const add = document.querySelector('.btn-add');
                add.addEventListener('click', function() {
                    openModal('modal-update');
                })
            </script>
        </section>
    </div>
</body>
</html>