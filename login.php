<?php
require_once 'header.php';
?>
    <div class="container">
        <form action="" id="loginForm" method="post">
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Fazer Login</button>
            <button id="cadastro" type="button">Fazer Cadastro</button>
        </form>
    </div>
    <script src="lib/js/login.js"></script>
    <script>
        $("#cadastro").click(function () {
            window.location.href = "cadastro.php"
        })
    </script>
<?php
require_once 'footer.php';
?>