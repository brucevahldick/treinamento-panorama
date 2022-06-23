<?php
require_once 'header.php';
?>
<div class="container">
    <div class="label-carteiras" id="label-1">
        <span>Todas as Transações</span>
        <span class="link" id="voltar">Voltar</span>
    </div>
    <div id="transacoes">
    </div>
    <button id="add-transaction">Adicionar Transação</button>
</div>
<script src="lib/js/todas-transacoes.js"></script>
<script>
    $("#add-transaction").click(function () {
        window.location.href = "adicionar_transacao.php?" + window.location.toString().split("?")[1]
    })
    $("#voltar").on("click", function () {
        window.location.href = "home.php?" + window.location.toString().split("?")[1]
    })
</script>
<?php
require_once 'footer.php';
?>
