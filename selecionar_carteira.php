<?php
require_once 'header.php';
?>
    <div class="container">
        <div id="carteiras-master">
            <div class="label-carteiras">Selecione uma Carteira:</div>
            <div id="carteiras">
            </div>
            <div class="label-carteiras">Ou crie uma nova: <span id="criar-carteira">clique aqui</span></div>
        </div>
    </div>
    <script src="lib/js/list-carteiras.js"></script>
    <script>
        $("#criar-carteira").on("click", function (){
            window.location.href = "criar_carteira.php"
        })
    </script>
<?php
require_once 'footer.php';
?>