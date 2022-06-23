<?php

class Movimentacao
{
    private $id;
    /**
     * 1 - Receita
     * 2 - Despesa
    */
    private $tipo;
    private $beneficiario;
    private $carteira;
    private $montante;

    /**
     * @param $tipo
     * @param $beneficiario
     * @param $carteira
     * @param $montante
     */
    public function __construct($tipo, $beneficiario, $carteira, $montante)
    {
        $this->tipo = $tipo;
        $this->beneficiario = $beneficiario;
        $this->carteira = $carteira;
        $this->montante = $montante;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * @param mixed $beneficiario
     */
    public function setBeneficiario($beneficiario): void
    {
        $this->beneficiario = $beneficiario;
    }

    /**
     * @return mixed
     */
    public function getCarteira()
    {
        return $this->carteira;
    }

    /**
     * @param mixed $carteira
     */
    public function setCarteira($carteira): void
    {
        $this->carteira = $carteira;
    }

    /**
     * @return mixed
     */
    public function getMontante()
    {
        return $this->montante;
    }

    /**
     * @param mixed $montante
     */
    public function setMontante($montante): void
    {
        $this->montante = $montante;
    }
}