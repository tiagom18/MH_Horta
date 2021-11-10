<?php
    session_start();
    include('../../model/conexao.php');
    include('../actions/verify.php');
    include('functions.php');
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
    <script type="text/javascript" src="jquery.js"></script>
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
                        <a href="../actions/logout.php">
                            <button type="submit" class="btn btn-logout">
                                <img class="btn-img" src="https://www.imagemhost.com.br/images/2021/10/01/exit_to_app.png" alt="exit_to_app.png" border="0">
                                <span class="btn-text">Logout</span>
                            </button>
                        </a>
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
                                <!-- <img class="filter-img" src="https://i.ibb.co/6v6P822/filter.png" alt="filter" border="0"> -->
                            </div>
                            <select class="filter-select"></select>
                            <button class="btn-add"></button>
                        </div>
                    </div>
                    <div class="list-datas">
                        <table>
                            <thead class="cont-info1">
                                <th>
                                <label class="conectado">
                                    <input type="checkbox" value="conectado">
                                    <span class="checkmark"></span>
                                </label>
                                </th>
                                <th>Venda ID</th>
                                <th>Cliente</th>
                                <th>Horta ID</th>
                                <th>Funcionário</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Actions</th>
                            </thead>
                            <tbody class="cont-datas">
                                <?php
                                    try {
                                        $stmt = $conexao->prepare("SELECT a.id_Venda, b.nome, c.id_Horta, a.id_func, a.situacao, a.data_venda FROM mh_venda as a INNER JOIN mh_cliente as b on a.id_Cliente = b.id_Cliente INNER JOIN mh_horta as c on a.id_Horta = c.id_Horta;");
                                        if($stmt->execute()) {
                                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                $id_Venda = $row["id_Venda"];
                                                $data_venda = $row["data_venda"];
                                                $situacao = $row["situacao"];
                                                $id_func = $row["id_func"];
                                                $id_Horta = $row["id_Horta"];
                                                $nome = $row["nome"];

                                                echo "<tr>
                                                    <td>
                                                        <label class='conectado'>
                                                            <input type='checkbox' value='conectado'>
                                                            <span class='checkmark'></span>
                                                    </label>
                                                    </td>
                                                    <td>$id_Venda</td>
                                                    <td>$nome</td>
                                                    <td>$id_Horta</td>
                                                    <td>$id_func</td>
                                                    <td>$situacao</td>
                                                    <td>$data_venda</td>
                                                    <td>
                                                        <center>
                                                            <a class='img-action' href='../actions/delete.php?id=".$row["id_Venda"]."'>
                                                                <img src='https://www.imagemhost.com.br/images/2021/10/18/delete.png' alt='delete.png' border='0'>
                                                            </a>
                                                            <a class='link-edit' href='#modal-update?id=".$row["id_Venda"]."'>
                                                                    <img id='img-edit' src='https://www.imagemhost.com.br/images/2021/10/18/edit.png' alt='edit.png' border='0'>
                                                            </a>
                                                            <a class='img-actions' href=''>
                                                                <img src='https://www.imagemhost.com.br/images/2021/10/18/delivery-box-1.png' alt='delivery-box-1.png' border='0'>
                                                            </a>
                                                        </center>
                                                    </td>
                                                </tr>";
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
                </div>
            </div>
            <div id="modal-insert" class="cont-modal">
                <div class="modal">
                    <button id="exit" class="btn-exit">
                            <img class="exit-img" src="https://i.postimg.cc/8zY4r6HD/close.png" alt="exit" border="0">
                        </button>
                    <div class="cont-info">
                        <span class="txt-form">Inserir</span>
                        <hr>
                        <form action="../actions/create.php" method="POST">
                            <div class="cont-f1">
                                <div class="form-client">
                                    <label for="client">Cliente</label>
                                    <?php
                                        select_cliente($conn);
                                    ?>
                                </div>
                                <div class="form-status">
                                    <label for="situacao">Status</label>
                                    <select id="status" class="select-status" name="situacao" type="text" value="" required>
                                        <option style="display: none"></option>
                                        <option value="Concluído">Concluído</option>
                                        <option value="Processando">Processando</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="cont-f2">
                                <div class="form-data">
                                    <label for="data">Data</label>
                                    <input id="data" class="input-data" name="data_venda" type="date" value="<?php
                                        echo (isset($data_venda) && ($data_venda != null || $data_venda != "")) ? $data_venda : '';
                                        ?>" required>
                                </div>
                                <div class="form-func">
                                    <label for="func">Funcionário</label>
                                    <?php
                                        select_func($conn);
                                    ?>
                                </div>
                                <div class="form-horta">
                                    <label for="horta">Horta ID</label>
                                    <?php
                                        select_horta($conn);
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="cont-f3">
                                <button type="submit" class="btn btn-save">
                                    <a href="">Salvar</a>
                                </button>
                                <button class="btn-cancelar">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="modal-update" class="cont-modal">
                <?php
                    $id_Venda = $_GET["id"];
                    $linha = le_venda($conn, $id_Venda);
                ?>
                <div class="modal">
                    <button id="exit" class="btn-exit">
                            <img class="exit-img" src="https://i.postimg.cc/8zY4r6HD/close.png" alt="exit" border="0">
                        </button>
                    <div class="cont-info">
                        <span class="txt-form">Alterar</span>
                        <hr>
                        <form action="../actions/update.php" method="GET">
                            <div class="cont-f1">
                                <div class="form-client">
                                    <label for="client">Cliente</label>
                                    <?php
                                        select_cliente($conn, $linha["id_Cliente"]);
                                    ?>
                                </div>
                                <div class="form-status">
                                    <label for="situacao">Status</label>
                                    <select id="status" class="select-status" name="situacao" type="text" value="<?php echo $linha["situacao"]; ?>" required>
                                        <option style="display: none"></option>
                                        <option value="Concluído">Concluído</option>
                                        <option value="Processando">Processando</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="cont-f2">
                                <div class="form-data">
                                    <label for="data">Data</label>
                                    <input id="data" class="input-data" name="data_venda" type="date" value="<?php echo $linha["data_venda"]; ?>" required>
                                </div>
                                <div class="form-func">
                                    <label for="func">Funcionário</label>
                                    <?php
                                        select_func($conn, $linha["id_func"]);
                                    ?>
                                </div>
                                <div class="form-horta">
                                    <label for="horta">Horta ID</label>
                                    <?php
                                        select_horta($conn, $linha["id_Horta"]);
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="cont-f3">
                                <button type="submit" class="btn btn-save">
                                    <a href="">Salvar</a>
                                </button>
                                <button class="btn-cancelar">Cancelar</button>
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
                            if(event.target.id == modalID || event.target.className == 'exit-img' || event.target.className == 'btn-cancelar') {
                                modal.classList.remove('mostrar');
                            }
                        })
                    }
                }

                const add = document.querySelector('.btn-add');
                add.addEventListener('click', function() {
                    openModal('modal-insert');
                })

                function openModal1(modalID1) {
                    const modal1 = document.getElementById(modalID1);
                    if(modal1) {
                        modal1.classList.add('mostrar');
                        modal1.addEventListener('click', (event) => {
                            if(event.target.id == modalID1 || event.target.className == 'exit-img' || event.target.className == 'btn-cancelar') {
                                modal1.classList.remove('mostrar');
                            }
                        })
                    }
                }

                const edit = document.querySelector('.link-edit');
                edit.addEventListener('click', function() {
                    openModal1('modal-update');
                })
            </script>
        </section>
    </div>
</body>
</html>