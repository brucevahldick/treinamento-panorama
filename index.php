<?php
require_once 'header.php';
require_once 'model/Session.php';

$session = new Session();
$idUsuario = $session->getValor('id');
if ($idUsuario == null)
    header("Location: login.php");
else
    header("Location: selecionar_carteira.php");

require_once 'footer.php';