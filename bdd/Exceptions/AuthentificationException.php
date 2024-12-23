<?php

namespace Kirankumar\Saes3\Exceptions;

use Exception;
use Throwable;

class AuthentificationException extends \Exception{
    public function __construct(string $message = "", int $code = 0, ?Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function redirectToForm(string $formUrl): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Stocker le message d'erreur dans la session
        $_SESSION['error_message'] = $this->getMessage();

        // Rediriger vers le formulaire avec le message d'erreur dans la session
        header("Location: $formUrl");
        exit();
    }
}