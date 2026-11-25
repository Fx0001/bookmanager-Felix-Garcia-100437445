<?php

class Database {

    private $servidor = '';
    private $puerto = '';
    private $dataBase = '';
    private $user = '';
    private $password = '';
    
     public function getConnection()
    {
        try {
            $dsn = "mysql:host={$this->servidor};port={$this->puerto};dbname={$this->dataBase};charset=utf8mb4";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }
}

?>