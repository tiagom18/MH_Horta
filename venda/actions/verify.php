<?php
    include('../../model/conexao.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_Venda = filter_input(INPUT_POST, 'id_Venda');
        $nome = filter_input(INPUT_POST, 'nome');
        $id_Horta = filter_input(INPUT_POST, 'id_Horta');
        $id_func = filter_input(INPUT_POST, 'id_func');
        $situacao = filter_input(INPUT_POST, 'situacao');
        $data_venda = filter_input(INPUT_POST, 'data_venda');
    } else if(!isset($id_Venda)) {
        $id_Venda = (isset($_GET["id_Venda"]) && $_GET["id_Venda"] != null) ? $_GET["id_Venda"] : "";
    }
?>