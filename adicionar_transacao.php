<?php
require_once 'header.php';
?>
    <div class="container">
        <form id="transacao_form" method="post">
            <input type="number" step="0.01" name="montante" id="montante" placeholder="Montante em R$" required>
            <select name="tipo" id="tipo-transacao">
                <option value="1">Receita</option>
                <option value="2">Despesa</option>
            </select>
            <input type="text" id="beneficiario" name="beneficiario" class="desativado" placeholder="Beneficiário">
            <select name="carteira" id="carteira-transacao">
            </select>
            <button type="submit">Cadastrar Movimentação</button>
            <button id="home" type="button">Voltar</button>
        </form>
    </div>
    <script src="lib/js/adicionar_transacao.js"></script>
    <script>
        $("#home").click(function () {
            window.location.href = "home.php?" + window.location.toString().split("?")[1]
        })
    </script>
<?php
require_once 'footer.php';
?>