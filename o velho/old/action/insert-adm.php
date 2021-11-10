<?php
require ("../model/conexao.php");


// Bloco If que Salva os dados no Banco - atua como Create e Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $produto != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE mh_pedido SET produto=?, quantidade=? WHERE id = ?");
            $stmt->bindParam(2, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO mh_pedido (produto, quantidade) VALUES (?, ?)");
        }
        $stmt->bindParam(1, $produto);
        $stmt->bindParam(2, $qde);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "Dados cadastrados com sucesso!";
                $id = null;
                $produto = null;
                $qde = null;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            echo "Erro: Não foi possível executar a declaração sql";
        }
    } catch (PDOException $erro) {
        echo "<p>Erro: " . $erro->getMessage() . "</p>";
    }
}
?>

