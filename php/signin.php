<?php
ob_start();
use Kirankumar\Saes3\Authentification;
use Kirankumar\Saes3\BddUserRepository;
use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\AuthentificationException;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if (!session_id()) {
    session_start();
}
require_once '../header/headerInscription.php';
require_once '../vendor/autoload.php';
$bdd = new Database();
try {
    $userRepository = new BddUserRepository($bdd);
} catch (BddConnectException $e) {
    $_SESSION['error_message'] = "Échec de la connexion à la base de données.";
    header("Location: connexion.php");
    exit;
}
$authService = new Authentification($userRepository);
try {
    // Vérifier si le formulaire de connexion a été envoyé
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        // Effectuer la connexion
        $authService->authentifier($email, $password);
        // Si la connexion réussit, rediriger vers la page d'accueil ou un tableau de bord
        $_SESSION['success_message'] = "Connexion réussie !";
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $userRepository->findUserByEmail($email)->getId();
        header("Location: compte.php");
        exit;
    }
} catch (AuthentificationException $e) {
    // Enregistrer l'erreur dans les logs pour analyse
    error_log($e->getMessage());
    // Utiliser la méthode de redirection de l'exception pour stocker l'erreur dans la session et rediriger
    $e->redirectToForm("connexion.php");
    exit;
} catch (Exception $e) {
    // Gérer toute autre erreur
    $_SESSION['error_message'] = "Une erreur inattendue est survenue : " . $e->getMessage();
    header("Location: connexion.php");
    exit;
}
require_once '../header/footer.php';

