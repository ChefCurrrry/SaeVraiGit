<?php

use Kirankumar\Saes3\BddUserRepository;
use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();
require_once '../header/headerCompte.php';
require_once '../vendor/autoload.php';

$bdd = new Database();
try {
    $userRepository = new BddUserRepository($bdd);
} catch (BddConnectException $e) {
    $_SESSION['error_message'] = "Échec de la connexion à la base de données.";
    header("Location: connexion.php");
    exit;
}
$pdo = $bdd->connect();
$email = $_SESSION['email'];
$user = $userRepository->findUserByEmail($email);
$userId = $user->getId();
$stmt = $pdo->prepare('SELECT * FROM ARepondu WHERE user_id = :userId');
$stmt->bindValue(':userId', $userId);
$stmt->execute();

$hasResponded = $stmt->fetchColumn() > 0; // Retourne true si l'utilisateur a déjà répondu

$stmt2 = $pdo->prepare('SELECT * FROM User WHERE id = :userId AND role like :role');
$stmt2->bindValue(':userId', $userId);
$stmt2->bindValue(':role', 'admin');
$stmt2->execute();

$isAdmin = $stmt2->fetchColumn() > 0;
?>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="../pages/accueil.html">
                <img src="../img/logo-association.png" alt="Logo">
            </a>
        </div>
        <button class="menu-toggle" aria-label="Menu">
            ☰ <!-- Icône du menu burger -->
        </button>
        <div class="containerBouton">
            <button class="navBouton" onclick="window.location.href='../pages/accueil.html';">Accueil</button>
            <button class="navBouton" onclick="window.location.href='../pages/quiSommesNous.html';">Qui sommes nous ?</button>
            <button class="navBouton" onclick="window.location.href='../pages/cancerDuLarynx.html';">Le cancer du larynx</button>
            <button class="navBouton" onclick="window.location.href='../pages/contact.html';">Contactez-nous</button>
            <button class="navBouton" onclick="window.location.href='logout.php';">Déconnexion</button>
        </div>
    </nav>
    <div class="container">
        <div class="header">
            <h1>Bienvenu sur votre espace</h1>
        </div>
        <?php if ($isAdmin): ?>
            <!-- Si l'utilisateur est administrateur, affiche uniquement le bouton des résultats -->
            <div class="containerBoutonForm">
                <button class="accessForm" onclick="window.location.href='resultat.php';">Accédez aux Résultats</button>
            </div>
            <div class="containerBoutonForm">
                <button class="accessForm" onclick="window.location.href='gestionComptes.php';">Gestion des Comptes</button>
            </div>
        <?php elseif (!$hasResponded): ?>
            <!-- Si l'utilisateur n'est pas administrateur et n'a pas répondu à l'enquête -->
            <div class="containerBoutonForm">
                <button class="accessForm" onclick="window.location.href='formulaire.php';">Accédez à l'enquête</button>
            </div>
        <?php else: ?>
            <!-- Si l'utilisateur n'est pas administrateur mais a déjà répondu à l'enquête -->
            <h2>Vous avez déjà répondu à l'enquête. Merci !</h2>
        <?php endif; ?>
    </div>

<?php
require_once '../header/footer.php';