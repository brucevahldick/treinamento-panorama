<?php

require_once '../model/Carteira.php';

class CarteiraRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = DbConnection::getInstance()->conn;
    }

    function insert(Carteira $carteira)
    {
        try {
            $sql = "insert into carteira(usuario, nome, tipo, previsao_gastos, previsao_receitas) 
                    values (" . $carteira->getUsuario() . ", '" . $carteira->getNome() . "', '" . $carteira->getTipo() . "', " . $carteira->getPrevisaoGastos() . ", " . $carteira->getPrevisaoReceitas() . ")";
            return $this->conn->exec($sql);
        } catch (PDOException $e) {
            die("Erro de inserção: " . $e->getMessage());
        }
    }

    function getAll($idUsuario = null)
    {
        try {
            $sql = "select * from carteira";
            $idUsuario != null ? $sql .= " where usuario = " . $idUsuario : "";
            return $this->conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Erro de consulta: " . $e->getMessage());
        }
    }

    function getById($id)
    {
        try {
            $sql = "select * from carteira where id = " . $id;
            return $this->conn->query($sql)->fetchObject();
        } catch (PDOException $e) {
            die("Erro de consulta: " . $e->getMessage());
        }
    }

}