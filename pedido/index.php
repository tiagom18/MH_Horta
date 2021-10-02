<?php
//Header
include_once 'includes/header.php';
?>
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
        <a  href="inserir.php" class="btn">Inserir Produto</a>
    </div>
</div>
<?php
//Footer
include_once 'includes\footer.php';
?>