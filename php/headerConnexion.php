<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/connexion.css">
    <script src="../js/connexion.js" defer></script>
    <title>Connexion</title>
</head>
<body>

<?php
if (isset($_SESSION['user_id'])) {
    echo '<a href="compte.php">Mon compte</a>';
    echo '<a href="logout.php">Déconnexion</a>';
} else {
    echo '<a href="connexion.php">Connexion</a>';
}
