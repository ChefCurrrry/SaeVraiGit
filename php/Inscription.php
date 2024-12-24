<?php
if(!session_id())
    session_start();
// Afficher le message d'erreur s'il est défini
if (!empty($_SESSION['error_message'])) {
    echo '<div style="color: red; background-color: #f8d7da; padding: 10px; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px; text-align: ;">';
    echo htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8');
    echo '</div>';
    // Supprimer le message d'erreur après l'affichage
    unset($_SESSION['error_message']);
}
require_once './HeaderInscription.php';
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
        <button class="navBouton" onclick="window.location.href='Connexion.php';">Compte</button>
    </div>
</nav>
<div class="spacer"></div>
<div class="form-container">
    <h2>Inscription</h2>
    <form action="signup.php" method="post">
        <label for="email">Votre mail *</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Votre mot de passe *</label>
        <input type="password" id="password" name="password" minlength="8"  required>

        <label for="re_password">Confirmer le mot de passe *</label>
        <input type="password" id="re_password" name="re_password" minlength="5" maxlength="10" required>

        <button type="submit">S'inscrire</button>
    </form>
    <p>Vous avez déjà un compte ? <a href="../php/Connexion.php">Connectez-vous</a></p>
</div>

<?php
require_once './Footer.php';
