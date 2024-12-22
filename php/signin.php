<?php

use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();

require_once '../vendor/autoload.php';

$bdd = new Database();

try{
    $pdo = $bdd->connect();
}catch(BddConnectException $e){
    $exception = new BddConnectException("Impossible de se connecter à la base de données : " . $e->getMessage());
    $exception->redirectToForm('Connexion.php'); // Redirection vers la page du formulaire
}



