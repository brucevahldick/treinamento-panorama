<?php
require_once '../model/Request.php';
require_once '../controller/MovimentacaoController.php';

$request = new Request();
$controller = new MovimentacaoController();
$requestMessage = $controller->getAll($request->get('id'), $request->get('limit'));
echo $requestMessage->enviarMensagem();
