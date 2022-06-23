<?php

class DbConnection
{
    private static $instance;
    public $conn;

    private function __construct()
    {
        try {
            $dsn = "pgsql:host=localhost;port=5433;dbname=treinamento";
            $user = "postgres";
            $password = "root";
            $this->conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

    }

    static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new DbConnection();

        return self::$instance;
    }
}