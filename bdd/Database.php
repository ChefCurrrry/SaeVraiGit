<?php

namespace Kirankumar\Saes3;

use PDO;
use PDOException;

class Database{
    public \PDO $pdo;
    private string $host;

    public function __construct(){
        $this->host = 'sqlite:../data/database.sqlite';
    }

    public function connect(): PDO{
        try {
            $this->pdo = new PDO($this->host);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connexion reussi";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        return $this->pdo;
    }

}