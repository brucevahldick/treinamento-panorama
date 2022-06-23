<?php
require_once '../model/Request.php';
require_once '../model/RequestMessage.php';
require_once '../controller/CadastroController.php';

$request = new Request();
if (
    $request->post('nome') &&
    $request->post('dataNascimento') &&
    $request->post('email') &&
    $request->post('emailValidacao') &&
    $request->post('senha') &&
    $request->post('senhaValidacao')
) {
    $controller = new CadastroController();
    $requestMessage = $controller->insert($request->post('nome'),
        $request->post('dataNascimento'),
        $request->post('email'),
        $request->post('emailValidacao'),
        $request->post('senha'),
        $request->post('senhaValidacao'));

    echo $requestMessage->enviarMensagem();
} else {
    $requestMessage = new RequestMessage("error", "Todos os campos devem ser preenchidos");
    echo $requestMessage->enviarMensagem();
}