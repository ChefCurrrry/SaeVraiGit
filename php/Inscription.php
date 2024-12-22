<?php
if(!session_id())
    session_start();
require_once './Header2.php';
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
<div class="spacer"></div>
<div class="form-container">
    <h2>Inscription</h2>
    <form>
        <label for="civility">Civilité</label>
        <select id="civility" name="civility" required>
            <option value="">--Sélectionnez--</option>
            <option value="mr">Monsieur</option>
            <option value="mme">Madame</option>
        </select>

        <label for="lastname">Votre nom</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="firstname">Votre prénom</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="birthDate">Date de naissance (ex : 19/04/1996)</label>
        <input type="date" id="birthDate" name="birthdate" required>

        <label for="email">Votre mail</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Votre mot de passe (entre 5 et 10 caractères)</label>
        <input type="password" id="password" name="password" minlength="5" maxlength="10" required>

        <label for="confirm-password">Confirmer le mot de passe</label>
        <input type="password" id="re-password" name="re-password" minlength="5" maxlength="10" required>

        <button type="submit">S'inscrire</button>
    </form>
    <p>Vous avez déjà un compte ? <a href="../php/Connexion.php">Connectez-vous</a></p>
</div>

<?php
require_once './Footer.php';
