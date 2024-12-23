<?php

namespace Kirankumar\Saes3\Exceptions;

use Throwable;

class BddConnectException extends \Exception
{
    public function __construct($message = "Erreur de connexion à la base de données", $code = 0, Throwable $previous = null){
        parent::__construct($message, $code, $previous);
    }

    public function redirectToForm($formUrl) : void {
        // Démarrer une session pour stocker le message d'erreur
        session_start();
        $_SESSION['error_message'] = $this->getMessage();

        // Rediriger vers la page du formulaire
        header("Location: $formUrl");
        exit;
    }
}
