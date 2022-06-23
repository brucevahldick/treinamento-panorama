<?php

class RequestMessage
{
    private $message;
    private $status;

    public function __construct($status, $message)
    {
        $this->message = $message;
        $this->status = $status;
    }

    function enviarMensagem(){
        return json_encode(array(
            'status' => $this->status,
            'message' => $this->message
        ));
    }

    function addToMessage($nomeDoCampo, $valor){
        $this->message->$nomeDoCampo = $valor;
    }
}