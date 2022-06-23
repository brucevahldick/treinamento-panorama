<?php

require_once '../model/Usuario.php';
require_once '../model/RequestMessage.php';
require_once '../model/Session.php';
require_once '../dao/UsuarioRepository.php';
require_once '../model/Login.php';

class LoginController
{
    function login($email, $senha)
    {
        $rep = new UsuarioRepository();
        $login = new Login($email, md5($senha));
        $usuario = $rep->login($login);
        if ($usuario) {
            $session = new Session();
            $usuarioLogado = new Usuario($usuario->nome, $usuario->data_nascimento, $usuario->email, $usuario->senha);
            $usuarioLogado->setId($usuario->id);
            $session->logUser($usuarioLogado);
            return new RequestMessage('success', 'usuário logado com sucesso');
        }
        return new RequestMessage('error', 'Dados de e-mail ou senha incorretos');
    }
}