<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Kirankumar\Saes3\Authentification;
use Kirankumar\Saes3\BddAnswerRepository;
use Kirankumar\Saes3\BddUserRepository;
use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;
use Kirankumar\Saes3\RepondreEnquete;
require_once '../vendor/autoload.php';
$bdd = new Database();
try {
    $userRepository = new BddUserRepository($bdd);
} catch (BddConnectException $e) {

}
$answerRepository = new BddAnswerRepository($bdd, $userRepository);
$answerRegisterService = new RepondreEnquete($answerRepository);

if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    echo $_SESSION['email'];
} else {
    // Gérer le cas où l'email est manquant ou invalide
    die('Erreur : Aucun utilisateur connecté ou email introuvable dans la session.');
}
try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement des données du formulaire
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $age = $_POST['age'] ?? '';
        $region = $_POST['region'] ?? '';
        $insertion = $_POST['insertion'] ?? '';
        $qualite = $_POST['qualite'] ?? '';
        $soutien = $_POST['soutien'] ?? '';

        $user = $userRepository->findUserByEmail($_SESSION['email']);
        $answerRegisterService->enregistrerReponse($user, $nom, $prenom, $age, $region, $insertion, $qualite, $soutien);
        echo "<p>Merci pour votre réponse, $prenom $nom. Vos informations ont été enregistrées.</p>";
        header('location: compte.php');
    }
}catch (Exception $e){
    $errorMessage = $e->getMessage();
    header('location: compte.php');
}

