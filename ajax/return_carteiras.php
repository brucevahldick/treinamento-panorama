<?php
require_once '../controller/CarteirasController.php';
require_once '../model/Session.php';

$session = new Session();
$controller = new CarteirasController();
$requestMessage = $controller->getAll($session->getValor('id'));
echo $requestMessage->enviarMensagem();