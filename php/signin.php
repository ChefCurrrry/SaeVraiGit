<?php

use Kirankumar\Saes3\Database;

if(!session_id())
    session_start();

require_once '../vendor/autoload.php';

$bdd = new Database();

try{
    $pdo = $bdd->connect();
}catch(PDOException $e){
    echo 'Erreur : '.$e->getMessage();
}



