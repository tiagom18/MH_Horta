

<?php  
     include("../model/conexao.php");
function le_venda($conexao, $id){  
  $row = array();
  try{
	$query = "SELECT id_Venda, date_format(dt_inicio,'%Y-%m-%d') as data_venda FROM mh_venda, 
	'status', id_func, id_Horta, id_Cliente FROM mh_vendas WHERE id_Vendas = :id;";
	
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
//troca para os valores de produto
function monta_select_Venda($conexao, $id_venda=0){
		
	// lista cursos já cadastrados
	try{
		$query = "SELECT id_Venda, date_format(dt_inicio,'%Y-%m-%d') as data_venda FROM mh_venda, 
		'status', id_func, id_Horta, id_Cliente FROM mh_Venda ORDER BY id_Venda;";
		$stmt=$conexao->prepare($query);
		$stmt->execute();
		echo "<select name=\"id_venda\">";
		// busca os dados lidos do banco de dados		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id_Venda = $row["id_Venda"];
			$data_venda = $row["data_venda"];			
			$status = $row["status"];	
			$id_func = $row["id_func"];
			$id_Horta = $row["id_Horta"];
			$id_Cliente = $row["id_Cliente"];

			$selected = "";
			if ($id_Venda == $id_venda) {
				$selected = "selected";
			}					
			echo "<option value=\"$id_Venda\" $selected>" . $status . '</option>';
		}
		 echo "</select>";
	  } catch(PDOException $erro) {
		echo 'ERROR: ' . $erro->getMessage(); 
	  }

}







function le_produto($conexao, $id){  
	$row = array();
  
	try{
		$query = "INSERT INTO mh_produto 
		(id_Produto, valor, nome, descricao, tipo, estoque ) 
		values (:id_Produto, :valor, :nome, :descricao, :tipo, :estoque);";
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
//alterar os valores para venda
function monta_select_curso($con, $id_curso_selecionado=0){
		
	// lista cursos já cadastrados
	try{
		$query = "SELECT id_curso, ds_curso FROM tb_curso ORDER BY ds_curso;";
		$stmt=$con->prepare($query);
		$stmt->execute();
		echo "<select name=\"id_curso\">";
		// busca os dados lidos do banco de dados		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["id_curso"];
			$curso = $row["ds_curso"];	
			$selected = "";
			if ($id == $id_curso_selecionado) {
				$selected = "selected";
			}					
			echo "<option value=\"$id\" $selected>" . $curso . '</option>';
		}
		 echo "</select>";
	  } catch(PDOException $erro) {
		echo 'ERROR: ' . $erro->getMessage(); 
	  }

}
//acrescentar funçoes para as outras tabelas
?>  
