<?php
require_once 'header.php';
?>
    <div class="container">
        <form id="cadastro_form" method="post">
            <input type="text" name="nome" id="nome" placeholder="Nome Completo" required>
            <input type="date" name="dataNascimento" id="dataNascimento" placeholder="Data de Nascimento" required>
            <input type="email" name="email" id="email" placeholder="E-mail" required>
            <input type="email" name="emailValidacao" id="emailValidacao" placeholder="Confirmar E-mail" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" required>
            <input type="password" name="senhaValidacao" id="senhaValidacao" placeholder="Confirmar Senha" required>
            <button type="submit">Fazer Cadastro</button>
            <button id="login" type="button">Voltar para o Login</button>
        </form>
    </div>
    <script src="lib/js/cadastro.js"></script>
    <script>
        $("#login").click(function () {
            window.location.href = "login.php"
        })
    </script>
<?php
require_once 'footer.php';
?>