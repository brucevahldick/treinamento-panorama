<?php

require_once 'Usuario.php';

class Session
{

    public function __construct()
    {
        session_start();
    }

    function setValor($chave, $valor)
    {
        $_SESSION[$chave] = $valor;
    }

    function getValor($chave)
    {
        if (isset($_SESSION[$chave]))
            return $_SESSION[$chave];
        else
            return false;
    }

    function logUser(Usuario $usuario)
    {
        $this->setValor('id', $usuario->getId());
    }

    function logOutUser()
    {
        session_destroy();
    }
}