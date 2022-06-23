<?php
require_once '../model/RequestMessage.php';
require_once '../model/Request.php';
require_once '../controller/CarteirasController.php';

$request = new Request();
$controller = new CarteirasController();

if (
    $request->post('id') &&
    $request->post('nome') &&
    $request->post('tipo')
) {
    $requestMessage = $controller->inserir(
        $request->post('id'),
        $request->post('nome'),
        $request->post('tipo'),
        $request->post('previsaoGastos'),
        $request->post('previsaoReceitas'));
} else {
    $requestMessage = new RequestMessage("error", "o nome e o tipo devem estar preenchidos");
}

echo $requestMessage->enviarMensagem();