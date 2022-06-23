<?php

require_once '../controller/LoginController.php';
require_once '../model/Request.php';
require_once '../model/RequestMessage.php';

$request = new Request();
if (
    $request->post('email') &&
    $request->post('senha')
) {
    $controller = new LoginController();
    $requestMessage = $controller->login($request->post('email'), $request->post('senha'));
    echo $requestMessage->enviarMensagem();
}else{
    $requestMessage = new RequestMessage('error', "todos os campos devem ser preenchidos");
    echo $requestMessage->enviarMensagem();
}