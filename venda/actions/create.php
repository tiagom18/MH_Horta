<?php
    include('../../model/conexao.php');

    $data_venda = $_POST["data_venda"];
    $situacao = $_POST["situacao"];
    $id_func = $_POST["id_func"];
    $id_Horta = $_POST["id_Horta"];
    $id_Cliente = $_POST["id_Cliente"];

  try {
	$query = "INSERT INTO mh_venda
	(data_venda, situacao, id_func, id_Horta, id_Cliente) 
	values (:data_venda, :situacao, :id_func, :id_Horta, :id_Cliente);";

	$stmt=$conexao->prepare($query);

	$stmt->bindParam(":data_venda", $data_venda, PDO::PARAM_STR);
	$stmt->bindParam(":situacao", $situacao, PDO::PARAM_STR);
	$stmt->bindParam(":id_func", $id_func, PDO::PARAM_STR);
	$stmt->bindParam(":id_Horta", $id_Horta, PDO::PARAM_INT);
	$stmt->bindParam(":id_Cliente", $id_Cliente, PDO::PARAM_STR);
	$stmt->execute();
	header('Location: ../screen/index.php');

  } catch (PDOException $erro) {
      echo "ERRO:". $erro->getMessage();
  }

    /* if(isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $id_Venda != "") {
        try {
            if ($id_Venda != "") {
                $stmt = $conexao->prepare("UPDATE mh_venda SET nome=?, id_Horta=?, id_func=?, situacao=?, data_venda=? WHERE id_Venda = ?");
                $stmt->bindParam(6, $id_Venda);
            } else {
                $stmt = $conexao->prepare("INSERT INTO mh_venda (nome, id_Horta, id_func, situacao, data_venda, id_Venda) VALUES (?, ?, ?, ?, ?, ?)");
            }
            $stmt->bindParam(1, $nome);
            $stmt->bindParam(2, $id_Horta);
            $stmt->bindParam(3, $id_func);
            $stmt->bindParam(4, $situacao);
            $stmt->bindParam(5, $data_venda);
            $stmt->bindParam(6, $id_Venda);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    echo "<p>Dados cadastrados com sucesso!</p>";
                    $id_Venda = null;
                    $nome = null;
                    $id_Horta = null;
                    $id_func = null;
                    $situacao = null;
                    $data_venda = null;
                } else {
                    echo "<p>Erro ao tentar efetivar cadastro</p>";
                }
            } else {
                echo "<p>Erro: Não foi possível executar a declaração sql</p>";
            }
        } catch (PDOException $erro) {
            echo "<p>Erro: " . $erro->getMessage() . "</p>";
        }
    }

    if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id_Venda != "") {
        try {
            $stmt = $conexao->prepare("SELECT * FROM mh_venda WHERE id_Venda = ?");
            $stmt->bindParam(1, $id_Venda, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id_Venda = $rs->id_Venda;
                $nome = $rs->nome;
                $id_Horta = $rs->id_Horta;
                $id_func = $rs->id_func;
                $situacao = $rs->situacao;
                $data_venda = $rs->data_venda;
            } else {
                echo "<p class=\"bg-danger\">Erro: Não foi possível executar a declaração sql</p>";
            }
        } catch (PDOException $erro) {
            echo "<p class=\"bg-danger\">Erro: " . $erro->getMessage() . "</p>";
        }
    } */
?>