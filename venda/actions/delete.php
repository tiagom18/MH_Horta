<?php
    include("../../model/conexao.php");

    $id_Venda = $_GET["id"];

    try {
        $query = "delete from mh_venda where id_Venda=:id;";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(":id", $id_Venda, PDO::PARAM_INT);
        $stmt->execute();
        echo "Exclusão efetuada com sucesso";

    } catch (PDOException $erro) {
        echo "ERRO:". $erro->getMessage();
    }

    /* if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id_Venda != "") {
        try {
            $stmt = $conexao->prepare("DELETE FROM mh_venda WHERE id_Venda = ?");
            $stmt->bindParam(1, $id_Venda, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo "<p>Registo foi excluído com êxito</p>";
                $id_Venda = null;
            } else {
                echo "<p>Erro: Não foi possível executar a declaração sql</p>";
            }
        } catch (PDOException $erro) {
            echo "<p>Erro: " . $erro->getMessage() . "</a>";
        }
    } */
    
?>