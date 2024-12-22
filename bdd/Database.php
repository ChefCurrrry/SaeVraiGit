<?php

namespace Kirankumar\Saes3;

use Kirankumar\Saes3\Exceptions\BddConnectException;
use PDO;
use PDOException;

class Database{
    public \PDO $pdo;
    private string $host;

    public function __construct(){
        $this->host = 'sqlite:../data/database.sqlite';
    }

    /**
     * @throws BddConnectException
     */
    public function connect(): PDO{
        try {
            $this->pdo = new PDO($this->host);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new BddConnectException("Erreur de connexion BDD : il faut configurer la classe BDDConnect avec les bonnes valeurs");
        }
        return $this->pdo;
    }

}