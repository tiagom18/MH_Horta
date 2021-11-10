<?php
    function le_venda($con, $id_Venda) {  
        $row = array();
        try {
            $query = "SELECT id_Venda, nome, id_Horta, id_func, situacao, data_venda FROM mh_venda WHERE id_Venda = :id;";
            $stmt=$con->prepare($query);
            $stmt->bindParam(":id", $id_Venda, PDO::PARAM_INT);
            $stmt->execute();
            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    return $row;
            }
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage(); 
        }
    }

    function select_cliente($con, $id_cliente=0) {
        try {
            $query = "SELECT id_Cliente, nome FROM mh_cliente ORDER BY nome;";
            $stmt=$con->prepare($query);
            $stmt->execute();
            echo "<select class=\"select-client\" name=\"id_Cliente\" required>";		
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id_Cliente"];
                $nome = $row["nome"];
                $selected = "";
                if ($id == $id_cliente) {
                    $selected = "";
                }
                echo "<option style='display: none'></option>";		
                echo "<option value=\"$id\">" . $nome . '</option>';
            }
            echo "</select>";
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage(); 
        }

    }

    function select_func($con, $id_func=0) {
        try {
            $query = "SELECT id_Venda, id_func FROM mh_venda";
            $stmt=$con->prepare($query);
            $stmt->execute();
            echo "<select class=\"select-func\" name=\"id_func\" required>";		
            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id_Venda"];
                $func = $row["id_func"];	
                $selected = "";
                if ($id == $id_func) {
                    $selected = "";
                }
                echo "<option style='display: none'></option>";					
                echo "<option value='João Santos'>" . $func . '</option>';
            }
            echo "</select>";
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage(); 
        }

    }

    function select_horta($con, $id_Horta=0) {
        try {
            $query = "SELECT id_Horta FROM mh_horta";
            $stmt=$con->prepare($query);
            $stmt->execute();
            echo "<select class=\"select-horta\" name=\"id_Horta\" required>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $id = $row["id_Horta"];
                $selected = "";
                if ($id == $id_Horta) {
                    $selected = "";
                }
                echo "<option style='display: none'></option>";					
                echo "<option value=\"$id\">" . $id . '</option>';
            }
            echo "</select>";
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage(); 
        }

    }
?>