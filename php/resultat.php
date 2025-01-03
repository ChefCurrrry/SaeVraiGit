<?php

use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();
require_once '../header/headerResultat.php';
require_once '../vendor/autoload.php';
$bdd = new Database();
try {
    $pdo = $bdd->connect();
} catch (BddConnectException $e) {
    $erreur = $e->getMessage();
}

$stmt = $pdo->query("
        SELECT region, COUNT(*) AS nombre, ROUND(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM Reponses), 2) AS pourcentage
        FROM Reponses
        GROUP BY region
        ORDER BY region ASC
    ");
$regions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les informations sur les âges
$ageStmt = $pdo->query("
        SELECT ROUND(AVG(age), 0) AS age_moyen, MIN(age) AS age_min, MAX(age) AS age_max
        FROM Reponses
    ");
$ageStats = $ageStmt->fetch(PDO::FETCH_ASSOC);

$insertionStmt = $pdo->query("
    SELECT insertion, COUNT(*) AS nombre
    FROM Reponses
    GROUP BY insertion
    ORDER BY insertion ASC
");
$insertions = $insertionStmt->fetchAll(PDO::FETCH_ASSOC);

// Convertir les données en JSON et les envoyer à JavaScript
echo '<script>let insertionData = ' . json_encode($insertions) . ';</script>';

//Requête pour afficher le camambert avec le pourcentage de personnes en fonction du soutien demandé
$soutienStmt = $pdo->query("
    SELECT soutien, COUNT(*) AS nombre
    FROM Reponses
    GROUP BY soutien
    ORDER BY nombre DESC
");
$soutiens = $soutienStmt->fetchAll(PDO::FETCH_ASSOC);

// Convertir les données en JSON et les envoyer à JavaScript
echo '<script>let soutienData = ' . json_encode($soutiens) . ';</script>';

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
    <h1>D'où viennent nos adhérents ?</h1>
    <table border="1">
        <thead>
        <tr>
            <th>Région</th>
            <th>Nombre</th>
            <th>Pourcentage</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($regions as $region): ?>
            <tr>
                <td><?= htmlspecialchars($region['region']); ?></td>
                <td><?= $region['nombre']; ?></td>
                <td><?= $region['pourcentage']; ?> %</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td>Total</td>
            <td><?= array_sum(array_column($regions, 'nombre')); ?></td>
            <td>100 %</td>
        </tr>
        </tfoot>
    </table>

    <h2>Âge des personnes concernées :</h2>
        <li>Âge moyen : <?= $ageStats['age_moyen']; ?> ans</li>
        <li>Âge minimum : <?= $ageStats['age_min']; ?> ans</li>
        <li>Âge maximum : <?= $ageStats['age_max']; ?> ans</li>

    <div id="insertion-chart" class="graphiqueContainer"></div>
    <h1>Nos adhérents ont-ils besoins de soutien ?</h1>
    <div id="chart"></div>
<?php
require_once '../header/footer.php';
