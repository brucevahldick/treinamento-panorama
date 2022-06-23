<?php

require_once "RequestMessage.php";

class TipoCarteiraFactory
{
    public static $CONTA_CORRENTE = "Conta Corrente";
    public static $POUPANCA = "Poupança";
    public static $CARTAO = "Cartão";
    public static $INVESTIMENTOS = "Investimentos";

    public static function getTipos(){
        $requestMessage = new RequestMessage("success", [
            TipoCarteiraFactory::$CONTA_CORRENTE,
            TipoCarteiraFactory::$POUPANCA,
            TipoCarteiraFactory::$CARTAO,
            TipoCarteiraFactory::$INVESTIMENTOS
            ]);

        return $requestMessage->enviarMensagem();
    }
}