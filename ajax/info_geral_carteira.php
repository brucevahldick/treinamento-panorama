<?php
require_once "../model/Request.php";
require_once "../model/RequestMessage.php";
require_once "../controller/MovimentacaoController.php";

$request = new Request();
$idCarteira = $request->get("id");
$controller = new MovimentacaoController();
$totalReceita = number_format($controller->calcularTotalReceitas($idCarteira), 2);
$totalDespesa = number_format($controller->calcularTotalDespesas($idCarteira), 2);
$total = number_format($controller->calcularValorCarteira($idCarteira), 2);
$requestMessage = new RequestMessage("success",
    [
        "receita" => $totalReceita,
        "despesa" => $totalDespesa,
        "total" => $total
    ]
);

echo $requestMessage->enviarMensagem();