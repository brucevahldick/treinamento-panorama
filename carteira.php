<?php
require_once 'header.php';
?>
<div class="container">
    <div class="label-carteiras">Estatísticas</div>
    <div id="valor-total"></div>
    <div id="resumo">
        <div class="border" id="despesa">
            <img src="img/despesa.jpg" alt="despesa">
            <div></div>
        </div>
        <div class="border" id="receita">
            <img src="img/receita.jpg" alt="despesa">
            <div></div>
        </div>
    </div>
    <button id="voltar" type="button">Voltar</button>
</div>
<script src="lib/js/carteira.js"></script>
<script>
    $("#voltar").on("click", function () {
        window.location.href = "home.php?" + window.location.toString().split("?")[1]
    })
</script>
<?php
require_once 'footer.php';
?>
