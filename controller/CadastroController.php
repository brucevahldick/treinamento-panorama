<?php

require_once '../model/Usuario.php';
require_once '../model/RequestMessage.php';
require_once '../model/Session.php';
require_once '../dao/UsuarioRepository.php';

class CadastroController
{
    function insert($nome,
                    $dataNascimento,
                    $email,
                    $emailValidacao,
                    $senha,
                    $senhaValidacao)
    {
        if (!$this->validar($email, $emailValidacao))
            return new RequestMessage('error', 'campo de e-mail e validação de e-mail devem ser iguais');

        if (!$this->validar($senha, $senhaValidacao))
            return new RequestMessage('error', 'campo de senha e validação de senha devem ser iguais');

        $usuario = new Usuario($nome, $dataNascimento, $email, md5($senha));

        $rep = new UsuarioRepository();
        if ($rep->insert($usuario)) {
            $usuario->setId($rep->lastInsertedId());
            $session = new Session();
            $session->logUser($usuario);
            return new RequestMessage('success', 'cadastro feito com sucesso');
        }

        return new RequestMessage("error", 'Erro ao tentar inserir, email já utilizado por outro usuário');
    }

    function validar($param1, $param2)
    {
        return $param1 == $param2;
    }
}