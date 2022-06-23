<?php

class Usuario
{
    private $id;
    private $carteiras;
    private $nome;
    private $dataNascimento;
    private $email;
    private $senha;

    public function __construct($nome, $dataNascimento, $email, $senha)
    {
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->email = $email;
        $this->senha = $senha;
        $this->carteiras = array();
    }

    public function addCarteira($carteira){
        $this->carteiras[] = $carteira;
    }

    /**
     * @return array
     */
    public function getCarteiras(): array
    {
        return $this->carteiras;
    }

    /**
     * @param array $carteiras
     */
    public function setCarteiras(array $carteiras): void
    {
        $this->carteiras = $carteiras;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param mixed $dataNascimento
     */
    public function setDataNascimento($dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}