<?php

use Kirankumar\Saes3\BddUserRepository;
use Kirankumar\Saes3\Database;
use Kirankumar\Saes3\Exceptions\BddConnectException;
use Kirankumar\Saes3\User;

require_once '../vendor/autoload.php';
$bdd = new Database();
try {
    $pdo = $bdd->connect();
} catch (BddConnectException $e) {
    $erreur = $e->getMessage();
}
try {
    $bddUser = new BddUserRepository($bdd);
} catch (BddConnectException $e) {
    $erreur = $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['user_id'];
    $action = $_POST['action'];

    if ($action === 'update_role') {
        // Mise à jour du rôle
        $newRole = $_POST['new_role'];
        $stmt = $pdo->prepare("UPDATE User SET role = :role WHERE id = :id");
        $stmt->execute(['role' => $newRole, 'id' => $userId]);

        echo "Rôle mis à jour avec succès !";
    } elseif ($action === 'delete_user') {
        // Suppression de l'utilisateur
        $stmt = $pdo->prepare("DELETE FROM User WHERE id = :id");
        $stmt->execute(['id' => $userId]);
        $stmt2 = $pdo->prepare("DELETE FROM Reponses WHERE user_id = :id");
        $stmt2->execute(['id' => $userId]);
        $stmt3 = $pdo->prepare("DELETE FROM ARepondu WHERE user_id = :id");
        $stmt2->execute(['id' => $userId]);


        echo "Utilisateur supprimé avec succès !";
    } elseif ($action === 'add_user') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hasher le mot de passe
        $role = $_POST['role'];
        $userId = $bddUser->getLastInsertedId();
        $user = new User($userId, $email, $password, $role);
        try {
            $bddUser->saveUser($user);
            echo "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Violation de contrainte UNIQUE (email déjà utilisé)
                echo "Erreur : Cet email est déjà utilisé.";
            } else {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
}


header("Location: gestionComptes.php");
exit();

