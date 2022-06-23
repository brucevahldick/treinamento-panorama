<?php
require_once '../controller/CarteirasController.php';
require_once '../controller/MovimentacaoController.php';
require_once '../model/Request.php';

$request = new Request();
$controllerMovimentacao = new MovimentacaoController();
$controllerCarteira = new CarteirasController();
$id = $request->get('id');
$requestMessage = $controllerCarteira->getById($id);
$requestMessage->addToMessage("valorTotal", number_format($controllerMovimentacao->calcularValorCarteira($id), 2));
echo $requestMessage->enviarMensagem();