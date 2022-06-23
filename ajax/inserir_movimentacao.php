<?php
require_once '../model/Request.php';
require_once '../controller/MovimentacaoController.php';

$request = new Request();
if (
    $request->post('montante') &&
    $request->post('tipo') &&
    $request->post('carteira')
) {
    $controller = new MovimentacaoController();
    if (!$request->post("beneficiario"))
        $beneficiario = null;
    else
        $beneficiario = $request->post("beneficiario");

    $requestMessage = $controller->inserir(
        $request->post("tipo"),
        $beneficiario,
        $request->post("carteira"),
        $request->post("montante"));
} else {
    $requestMessage = new RequestMessage("error", "É necessário selecionar um tipo, uma carteira e um montante");
}
echo $requestMessage->enviarMensagem();