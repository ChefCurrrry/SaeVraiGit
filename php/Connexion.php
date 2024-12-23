<?php
if(!session_id())
    session_start();
// Afficher le message d'erreur s'il est défini
if (!empty($_SESSION['error_message'])) {
    echo '<div style="color: red; background-color: #f8d7da; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">';
    echo htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8');
    echo '</div>';

    // Supprimer le message d'erreur après l'affichage
    unset($_SESSION['error_message']);
}
require_once './HeaderConnexion.php';

?>

?>
<nav class="navbar">
    <div class="navbar-logo">
        <a href="../pages/Accueil.html">
            <img src="../img/logo-association.png" alt="Logo">
        </a>
    </div>
    <button class="menu-toggle" aria-label="Menu">
        ☰ <!-- Icône du menu burger -->
    </button>
    <div class="containerBouton">
        <button class="navBouton" onclick="window.location.href='../pages/Accueil.html';">Accueil</button>
        <button class="navBouton" onclick="window.location.href='../pages/Qui_Sommes_Nous.html';">Qui sommes nous ?</button>
        <button class="navBouton" onclick="window.location.href='../pages/Cancer_Larynx.html';">Le cancer du larynx</button>
        <button class="navBouton" onclick="window.location.href='../pages/Contact.html';">Contactez-nous</button>
        <button class="navBouton" onclick="window.location.href='Connexion.php';">Connexion</button>
    </div>
</nav>
<div class="spacer3"></div>
<section class="connexion-info text-center">
    <h3>Connectez-vous pour accéder à vos informations !</h3>
</section>
<section class="connexion-info container">
    <div class="row">
        <!-- Formulaire de Connexion -->
        <div class="connexion-form">
            <h2>Connexion</h2>
            <form action="signin.php" method="post">
                <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
                </div>
                <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required>
                    <button type="submit" class="btnSubmit">Se connecter</button>
                </div>
            </form>
            <a>Pas encore de compte ? </a><a href="Inscription.php">Inscrivez-vous</a>
        </div>
    </div>
</section>


<?php
require_once './Footer.php';