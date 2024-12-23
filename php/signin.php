<?php

use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();

require_once 'Header1.php';
require_once '../vendor/autoload.php';

$bdd = new Database();

try{
    $pdo = $bdd->connect();
}catch(BddConnectException $e){
    $e = new BddConnectException("Impossible de se connecter à la base de données : " . $e->getMessage());
    $e->redirectToForm('Connexion.php'); // Redirection vers la page du formulaire
    die();
}


require_once 'Footer.php';


