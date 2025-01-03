<?php

use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;

if(!session_id())
    session_start();

require_once '../header/headerGestion.php';
require_once '../vendor/autoload.php';

$bdd = new Database();
try {
    $pdo = $bdd->connect();
} catch (BddConnectException $e) {
    $erreur = $e->getMessage();
}

$users = $pdo->query("SELECT id, email, role, created_at FROM User")->fetchAll();

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
        <button class="navBouton" onclick="window.location.href='compte.php';">Compte</button>
    </div>
</nav>
<div class="spacer"></div>
<h1>Gestion des Comptes</h1>
<table >
    <thead>
    <tr>
        <th>Email</th>
        <th>Rôle</th>
        <th>Date de création</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <form method="POST" action="manage_users.php" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <select name="new_role">
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="member" <?= $user['role'] === 'member' ? 'selected' : '' ?>>Membre</option>
                    </select>
                    <button type="submit" name="action" value="update_role">Mettre à jour</button>
                </form>
            </td>
            <td><?= htmlspecialchars($user['created_at']) ?></td>
            <td>
                <form method="POST" action="manage_users.php" style="display:inline;">
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <button type="submit" name="action" value="delete_user">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
    <div class="containerBoutonForm">
        <button class="accessForm" id="toggleFormButton">Ajouter un compte</button>
    </div>
    <div id="addUserForm" class="addUserForm">
        <form method="POST" action="manage_users.php">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="role">Rôle :</label>
            <select id="role" name="role">
                <option value="admin">Admin</option>
                <option value="member" selected>Membre</option>
            </select><br><br>

            <button type="submit" name="action" value="add_user">Ajouter</button>
        </form>
    </div>

<?php
require_once '../header/footer.php';