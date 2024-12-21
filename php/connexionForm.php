<?php
if(!session_id())
    session_start();

use Kirankumar\Saes3\BddConnect;
use Kirankumar\Saes3\Exception\BddConnectException;
use Kirankumar\Saes3\Messages;

require_once "Header1.php";
require_once "../vendor/autoload.php";
var_dump($_POST);

$bdd = new BddConnect();

try {
    $pdo = $bdd->connexion();
}
catch(BddConnectException $e) {
    Messages::goHome($e->getMessage(), $e->getType(), "Connexion.php");
}


