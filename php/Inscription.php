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
require_once './headerInscription.php';
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
<div class="spacer"></div>
<div class="form-container">
    <h2>Inscription</h2>
    <form action="signup.php" method="post">
        <label for="email">Votre mail *</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Votre mot de passe *</label>
        <input type="password" id="password" name="password" minlength="8"  required>

        <span id="show-recommendations" style="cursor: pointer; color: #000000; font-size: 1.2em;">&#8505;</span>

        <div id="password-recommendations" style="display: none; margin-top: 5px;">
            <small>Votre mot de passe doit contenir :</small>
            <ul>
                <li>Au moins 8 caractères</li>
                <li>Une lettre majuscule</li>
                <li>Un chiffre</li>
                <li>Un caractère spécial (par exemple, !, @, #, etc.)</li>
            </ul>
        </div>

        <label for="re_password">Confirmer le mot de passe *</label>
        <input type="password" id="re_password" name="re_password" minlength="5" maxlength="10" required>
        <div class="show-password">
        <label for="show-password" style="display: inline; margin-left: 5px;">Afficher le mot de passe<input type="checkbox" id="show-password"></label>
        </div>
        <button type="submit">S'inscrire</button>
    </form>

    <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
</div>

<?php
require_once './footer.php';
