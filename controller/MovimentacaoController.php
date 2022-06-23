<?php

require_once '../model/Movimentacao.php';
require_once '../dao/MovimentacaoRepository.php';
require_once '../model/RequestMessage.php';

class MovimentacaoController
{
    function inserir($tipo, $beneficiario, $carteira, $montante)
    {
        $rep = new MovimentacaoRepository();

        if ($tipo == 2 && empty($beneficiario))
            return new RequestMessage("error", "É necessário informar o beneficiário da despesa");

        $movimentacao = new Movimentacao($tipo, $beneficiario, $carteira, $montante);

        if ($rep->insert($movimentacao))
            return new RequestMessage("success", "movimentacao cadastrada com sucesso");

        return new RequestMessage("error", "erro ao tentar cadastrar movimentação");
    }

    function getAll($idCarteira = null, $limit = null)
    {
        $rep = new MovimentacaoRepository();
        return new RequestMessage("success", $rep->getAll($idCarteira, $limit));
    }

    function calcularValorCarteira($idCarteira)
    {
        $despesas = $this->calcularTotalDespesas($idCarteira);
        $receitas = $this->calcularTotalReceitas($idCarteira);

        return $receitas - $despesas;
    }

    function calcularTotalTipo($tipo, $idCarteira){
        $rep = new MovimentacaoRepository();
        $movimentacoes = $rep->getAllByTipo($tipo, $idCarteira);
        $valor = 0;
        foreach ($movimentacoes as $movimentacao)
            $valor += $movimentacao['montante'];

        return $valor;
    }

    function calcularTotalDespesas($idCarteira)
    {
        return $this->calcularTotalTipo(2, $idCarteira);
    }

    function calcularTotalReceitas($idCarteira)
    {
        return $this->calcularTotalTipo(1, $idCarteira);
    }
}