<?php

require_once 'DbConnection.php';
require_once '../model/Movimentacao.php';

class MovimentacaoRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = DbConnection::getInstance()->conn;
    }

    function insert(Movimentacao $movimentacao)
    {
        try {
            $sql = "insert into movimentacao(montante, beneficiario, carteira, tipo, data) 
                    values(" . $movimentacao->getMontante() . ", '" . $movimentacao->getBeneficiario() . "', 
                    " . $movimentacao->getCarteira() . ", " . $movimentacao->getTipo() . ", now())";
            return $this->conn->exec($sql);
        } catch (PDOException $e) {
            die("Erro de inserção: " . $e->getMessage());
        }
    }

    function getAll($idCarteira = null, $limit = null)
    {
        try {
            $sql = "select id, round(montante, 2) as montante, beneficiario, carteira, tipo, to_char(data, 'DD/MM/YYYY') as data from movimentacao";
            $idCarteira != null ? $sql .= " where carteira = " . $idCarteira : "";
            $sql .= " order by 1 desc";
            $limit != null ? $sql .= " limit " . $limit : "";
            return $this->conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Erro de consutla: " . $e->getMessage());
        }
    }

    function getAllByTipo($tipo, $idCarteira = null)
    {
        try {
            $sql = "select id, round(montante, 2) as montante, beneficiario, carteira, tipo, data from movimentacao where tipo = " . $tipo;
            $idCarteira != null ? $sql .= " and carteira = " . $idCarteira : "";
            return $this->conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Erro de consulta: " . $e->getMessage());
        }
    }

}