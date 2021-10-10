<?php  
    include("../model/conexao.php");
function le_curso($con, $id){  // fazer função venda
  $row = array();
  //trocar para os valores de venda
  try{
	$query = "SELECT id_curso, 
	ds_curso, 
	nr_carga_horaria, 
	date_format(dt_inicio,'%Y-%m-%d') as dt_inicio 
	FROM tb_curso 
	where id_curso = :id;";
	$stmt=$conexao->prepare($query);
	$stmt->bindParam(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			return $row;
	 }
  } catch(PDOException $e) {
    echo 'ERROR: ' . $erro->getMessage();
  }

}
//troca para os valores de produto

function le_aluno($con, $id){  
	$row = array();
  
	try{
	  $query = "SELECT id_aluno, ds_aluno, id_curso FROM tb_aluno WHERE id_aluno = :id;";
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
