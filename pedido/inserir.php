<?php
//Header
include_once 'includes/header.php';
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <div class="form-popup" id="in-form">
            <form action="" class="form-container">
                <h3 class="light">Inserir Produto</h3>
                
                <div class="input-field col s12">
                    <input type=text name="nome" id="nome">
                    <label for="nome">Produto</label>
                </div>

                <div class="input-field col s12">
                    <input type=text name="qtd" id="qtd">
                    <label for="qtd">Qtd.</label>
                </div>
                
                <div class="input-field col s12">
                    <input type=text name="valor" id="valor">
                    <label for="valor">Valor</label>
                </div>
                <button class="btn blue">Inserir</button>
                <a href="index.php"class="btn red">Cancelar</a>
            </form>
        </div>
        <br>
        <a  href="" class="btn green">Voltar ao painel de Venda</a>
    </div>
</div>

<?php
//Footer
include_once 'includes\footer.php';
?>