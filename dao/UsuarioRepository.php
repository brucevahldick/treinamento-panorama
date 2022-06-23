<?php

require_once '../model/Login.php';
require_once '../model/Usuario.php';
require_once 'DbConnection.php';

class UsuarioRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = DbConnection::getInstance()->conn;
    }

    function insert(Usuario $usuario)
    {
        try {
            $sql = "insert into usuario(nome, data_nascimento, email, senha) 
                    values ('" . $usuario->getNome() . "', '" . $usuario->getDataNascimento() . "', '" . $usuario->getEmail() . "', '" . $usuario->getSenha() . "')";
            return $this->conn->exec($sql);
        } catch (PDOException $e) {
            return false;
//            die("Erro de inserção: " . $e->getMessage());
        }
    }

    function getByEmail($email)
    {
        try {
            $sql = "select * from usuario where email = '" . $email . "'";
            return $this->conn->query($sql)->fetchObject();
        } catch (PDOException $e) {
            die("Erro de consulta: " . $e->getMessage());
        }
    }

    function lastInsertedId()
    {
        try {
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            die("Erro de pegar o último id: " . $e->getMessage());
        }
    }

    function login(Login $login)
    {
        $usuario = $this->getByEmail($login->getEmail());
        if ($usuario) {
            if ($usuario->senha == $login->getSenha()) {
                return $usuario;
            }
        }
        return false;
    }
}