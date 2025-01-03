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
    echo '<a href="../php/compte.php">Mon compte</a>';
    echo '<a href="../php/logout.php">Déconnexion</a>';
} else {
    echo '<a href="../php/connexion.php">Connexion</a>';
}
