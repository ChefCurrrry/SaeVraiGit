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


require_once '../header/headerConnexion.php';
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // Si l'utilisateur est déjà connecté, il ne doit pas voir la page de connexion
    // Rediriger vers la page compte.php si l'utilisateur est déjà connecté
    header("Location: compte.php");
    exit();
}
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
        <button class="navBouton" onclick="window.location.href='Connexion.php';">Compte</button>
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
                    <label>
                        <input type="email" name="email" class="form-control" placeholder="Adresse e-mail" required>
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe" required>
                    </label>
                    <div class="show-password">
                        <label for="show-password" style="margin-left: 5px; display: flex; align-items: center">Afficher le mot de passe<input type="checkbox" id="show-password" style="margin-left: 10px;"></label>
                    </div>
                    <button type="submit" class="btnSubmit">Se connecter</button>
                </div>
            </form>
            <a>Pas encore de compte ? </a><a href="inscription.php">Inscrivez-vous</a>
        </div>
    </div>
</section>


<?php
require_once '../header/footer.php';