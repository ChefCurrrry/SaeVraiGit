<?php


require_once 'headerCompte.php';
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
<?php
require_once 'footer.php';