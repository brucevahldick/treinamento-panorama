<?php

require_once "../model/RequestMessage.php";
require_once "../model/Carteira.php";
require_once '../dao/CarteiraRepository.php';
require_once '../dao/DbConnection.php';

class CarteirasController
{
    function inserir($usuario, $nome, $tipo, $previsaoGastos, $previsaoReceitas)
    {
        if (!$previsaoReceitas)
            $previsaoReceitas = 0;

        if (!$previsaoGastos)
            $previsaoGastos = 0;

        $carteira = new Carteira($usuario, $nome, $tipo, $previsaoGastos, $previsaoReceitas);
        $rep = new CarteiraRepository();
        if ($rep->insert($carteira)) {
            return new RequestMessage("success", "Sucesso ao inserir registro");
        }
        return new RequestMessage("error", "Erro ao tentar inserir registro");
    }

    function getAll($idUsuario = null)
    {
        $rep = new CarteiraRepository();
        return new RequestMessage('success', $rep->getAll($idUsuario));
    }

    function getById($id)
    {
        $rep = new CarteiraRepository();
        return new RequestMessage('success', $rep->getById($id));
    }
}