<?php  

function le_venda($conexao, $id_Venda){  
  $row = array();
  
  try{
	$query = " SELECT id_Venda, 
	date_format(data_venda,'%Y-%m-%d') as data_venda, situacao,id_func,id_Horta,id_Cliente FROM mh_venda 
	where id_Venda = :id;";
	$stmt=$conexao->prepare($query);
	$stmt->bindParam(":id", $id_Venda, PDO::PARAM_INT);
	$stmt->execute();
	if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row;
	 }
  } catch(PDOException $erro) {
    echo 'ERROR: ' . $erro->getMessage(); 
  }

}


function le_pedido($conexao, $id){  
	$row = array();
  
	try{
	  $query = " SELECT id_aluno, ds_aluno, id_curso FROM tb_aluno WHERE id_aluno = :id;";
	  $stmt=$conexao->prepare($query);
	  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
	  $stmt->execute();
	  if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			  return $row;
	   }
	} catch(PDOException $erro) {
	  echo 'ERROR: ' . $erro->getMessage(); 
	}
  
}

function monta_select_venda($conexao, $id_Venda_selecionado = 0){
		
	// lista vendas já cadastrados
	try{
		$query = " SELECT id_Venda, id_Cliente FROM mh_venda ORDER BY id_Cliente;";
		$stmt=$conexao->prepare($query);
		$stmt->execute();
		echo "<select name=\"id_Venda\">";
		// busca os dados lidos do banco de dados		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id_Venda"];
			$cliente = $row["id_Cliente"];	
			$selected = "";
			if ($id == $id_Venda_selecionado) {
				$selected = "selected";
			}					
			echo "<option value=\"$id\" $selected>" . $cliente . '</option>';
		}
		 echo "</select>";
	  } catch(PDOException $erro) {
		echo 'ERROR: ' . $erro->getMessage(); 
	  }

}

?>  
