<?php

class Request
{
    function post($chave)
    {
        if (isset($_POST[$chave]))
            return $_POST[$chave];
        return false;
    }

    function get($chave)
    {
        if (isset($_GET[$chave]))
            return $_GET[$chave];
        return false;
    }
}