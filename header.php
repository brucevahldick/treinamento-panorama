<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="lib/css/style.css">
    <script src="lib/js/jquery-3.6.0.min.js"></script>
    <script src="lib/js/jquery.mask.js"></script>
</head>
<body>
<?php
require_once 'model/Session.php';
$session = new Session();
if (!$session->getValor('id') && ($_SERVER["REQUEST_URI"] != '/treinamento-panorama/login.php' && $_SERVER["REQUEST_URI"] != '/treinamento-panorama/cadastro.php'))
    header("Location: ajax/logout.php");
?>
<header>
    <div class="container" id="header">
        <div id="logo"><img src="img/logo.jpg" alt="Logo"></div>
        <a href="ajax/logout.php">
            <div id="foto"><img src="img/user.jpg" alt="User"></div>
        </a>
    </div>
</header>
