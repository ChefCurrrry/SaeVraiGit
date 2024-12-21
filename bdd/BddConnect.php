<?php

namespace Kirankumar\Saes3;

use Kirankumar\Saes3\Exception\BddConnectException;

class BddConnect{
    public \PDO $pdo;
    protected ?string $host = null;

    public function __construct() {
        $this->host = '../data/bddSae.sqlite';
    }

    /**
     * @throws BddConnectException
     */
    public function connexion() : \PDO {
        try {
            $dsn = "sqlite:../data/bddSae.sqlite";
            $this->pdo = new \PDO($dsn);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        catch(\PDOException $e) {
            throw new BddConnectException("Erreur de connexion BDD : il faut configurer la classe BDDConnect avec les bonnes valeurs");
        }

        return $this->pdo;
    }
}