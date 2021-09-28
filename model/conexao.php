<?php
    try {
        $conexao = new PDO("mysql:host=localhost; dbname=mh_trabalho", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
    } catch (PDOException $erro) {
        echo "Erro na conexão: ".$erro->getMessage();
    }
?>