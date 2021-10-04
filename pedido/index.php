
<?php
    //Header
    include_once 'includes/header.php';
    //conexao com o banco de dados
    include '../model/conexao.php';
    //Alimentacao do select com PDO
    $sql = " SELECT nome FROM mh_produto";
   
   
    try {
        $stmt = $conexao -> prepare($sql);
        $stmt -> execute();
        $results = $stmt -> fetchAll();
    }
    catch(Exception $ex){
        echo ($ex -> getMessage());

    }
?>
<link rel="stylesheet" href="../login/screen/style.css">
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Pedido - Venda Nº X</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor Un</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="" class="btn-floating green"><i class="material-icons">edit</i></a></td>
                    <td><a href="" class="btn-floating green"><i class="material-icons">delete</i></a></td>
                </tr>
            <tbody>
        </table>
        <br>
    <!-- Trigger/Open The Modal -->
<button id="myBtn">Inserir</button>

<!-- The Modal -->
<div id="myModal" class="modal">
<p>
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
</p>


   
    <label for="produto"><b>Produto</b>
                        <select id="nome" name="nome" style="display: block;">
                            <option value="">Selecione o Produto</option>
                            <?php foreach ($results as $output) {?>
                              <option value="<?php echo $output["nome"];?>"><?php echo $output["nome"];?></option>  
                              <?php } ?>
                        </select>
                        </label>              
                            


    <label ><b>Quantidade</b></label>
    <input type="text" placeholder="Coloque a Quantidade">

    
    
    <button type="submit" class="btn">Inserir</button>
  </form>
  
</div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php
//Footer
include_once 'includes\footer.php';
?>