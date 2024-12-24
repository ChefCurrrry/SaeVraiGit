<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Connexion.css">
    <script src="../js/Connexion.js" defer></script>
    <title>Connexion</title>
</head>
<body>

<?php
if (isset($_SESSION['user_id'])) {
    echo '<a href="Compte.php">Mon compte</a>';
    echo '<a href="logout.php">Déconnexion</a>';
} else {
    echo '<a href="Connexion.php">Connexion</a>';
}
