<?php
require_once 'header.php';
?>
    <div class="container">
        <div class="label-carteiras" id="label-1">
            <span>Minha Carteira</span>
            <span class="link" id="mudar-carteira">Selecionar Outra Carteira</span>
        </div>
        <div id="carteira">
            <span id="titulo"></span>
        </div>
        <div id="label-transacoes" class="label-carteiras">
            <span>Transações Recentes</span>
            <span class="link" id="link-view-all">Ver todas</span>
        </div>
        <div id="transacoes"></div>
        <button id="add-transaction">Adicionar Transação</button>
    </div>
    <script src="lib/js/home.js"></script>
    <script>
        $("#add-transaction").click(function () {
            window.location.href = "adicionar_transacao.php?" + window.location.toString().split("?")[1]
        })
        $("#link-view-all").click(function () {
            window.location.href = "todas-transacoes-carteira.php?" + window.location.toString().split("?")[1]
        })
        $("#mudar-carteira").click(function () {
            window.location.href = "selecionar_carteira.php"
        })
        $("#carteira").click(function () {
            window.location.href = "carteira.php?" + window.location.toString().split("?")[1]
        })
    </script>
<?php
require_once 'footer.php';
?>