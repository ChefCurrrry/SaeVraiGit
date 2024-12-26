<?php
ob_start();
use Kirankumar\Saes3\Authentification;
use Kirankumar\Saes3\BddUserRepository;
use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\AuthentificationException;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();

require_once 'headerInscription.php';
require_once '../vendor/autoload.php';

$bdd = new Database();
try {
    $userRepository = new BddUserRepository($bdd);
} catch (BddConnectException $e) {
}
$authService = new Authentification($userRepository);
try {
    // Vérifier si le formulaire a été envoyé
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $repeatPassword = $_POST['re_password'] ?? '';


        // Effectuer l'inscription
        $authService->enregistrer($email, $password, $repeatPassword);

        // Si l'inscription réussit, redirection vers la page de connexion
        $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        header("Location: connexion.php");
        exit;
    }
} catch (AuthentificationException $e) {
    error_log($e->getMessage()); // Enregistrer l'erreur dans les logs pour analyse
    $e->redirectToForm('inscription.php');
    die();
} catch (Exception $e) {
    // Gérer toute autre erreur
    $_SESSION['error_message'] = "Une erreur inattendue est survenue : " . $e->getMessage();
    header("Location: inscription.php");
    exit;
}

require_once 'footer.php';
