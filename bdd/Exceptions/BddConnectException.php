<?php

namespace Kirankumar\Saes3\Exceptions;

use Throwable;

class BddConnectException extends \Exception {
    public function __construct($message = "Erreur de connexion à la base de données", $code = 0, Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }
}
