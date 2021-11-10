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


function le_pedido($conexao, $id_Pedido){  
	$row = array();
  
	try{
	  $query = "SELECT id_Pedido, quantidade, id_Venda, id_Cliente, id_Produto FROM mh_pedido WHERE id_Pedido = :id;";
	  $stmt=$conexao->prepare($query);
	  $stmt->bindParam(":id", $id_Pedido, PDO::PARAM_INT);
	  $stmt->execute();
	  if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			  return $row;
	   }
	} catch(PDOException $erro) {
	  echo 'ERROR: ' . $erro->getMessage(); 
	}
  
}


?>  
