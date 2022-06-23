<?php
require_once 'header.php';
?>
    <div class="container">
        <form action="" id="form-carteira" method="post">
            <input type="hidden" name="id" value="<?php echo $session->getValor('id') ?>">
            <input name="nome" id="nome" type="text" placeholder="Nome" required>
            <select id="tipos-carteira" name="tipo">
            </select>
            <input type="text" name="previsaoGastos" id="previsaoGastos" placeholder="Previsão de Gastos">
            <input type="text" name="previsaoReceitas" id="previsaoReceitas" placeholder="Previsão de Receitas">
            <button type="submit">Criar Carteira</button>
            <button id="voltar" type="button">Voltar</button>
        </form>
    </div>
    <script src="lib/js/criar-carteira.js"></script>
    <script>
        $("#voltar").click(function () {
            window.location.href = "selecionar_carteira.php"
        })
    </script>
<?php
require_once 'footer.php';
?>