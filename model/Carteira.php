<?php

class Carteira
{
    private $id;
    private $usuario;
    private $nome;
    private $tipo;
    private $previsaoGastos;
    private $previsaoReceitas;

    public function __construct($usuario, $nome, $tipo, $previsaoGastos = null, $previsaoReceitas = null)
    {
        $this->usuario = $usuario;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->previsaoGastos = $previsaoGastos;
        $this->previsaoReceitas = $previsaoReceitas;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed|null
     */
    public function getPrevisaoGastos()
    {
        return $this->previsaoGastos;
    }

    /**
     * @return mixed|null
     */
    public function getPrevisaoReceitas()
    {
        return $this->previsaoReceitas;
    }

}