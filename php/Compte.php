<?php


require_once 'HeaderCompte.php';
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
        <button class="navBouton" onclick="window.location.href='logout.php';">Déconnexion</button>
    </div>
<?php
require_once 'Footer.php';