<?php

namespace Kirankumar\Saes3;

use Kirankumar\Saes3\Exceptions\BddConnectException;
use PDO;

class BddUserRepository implements IUserRepository{
    private \PDO $pdo;

    /**
     * @throws BddConnectException
     */
    public function __construct(Database $bdd){
        $this->pdo = $bdd->connect();
    }

    /**
     * Sauvegarde le nouvel utilisateur dans la base de données avec une insertion de donnée
     * @param User $user
     * @return bool
     */
    public function saveUser(User $user): bool{
        $request = "INSERT INTO User (email, password, role) VALUES (:email, :password, :role)";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(":email", $user->getEmail());
        $stmt->bindValue(":password", $user->getPassword());
        $stmt->bindValue(":role", $user->role(), PDO::PARAM_STR);
        return $stmt->execute();

    }

    /**
     * Cherche l'utilisateur lors de la connexion
     * @param string $email
     * @return User|null
     */
    public function findUserByEmail(string $email): ?User{
        $request = "SELECT id, email, password, role FROM User WHERE email = :email";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $tab = $stmt->fetch();

        if ($tab === false) {
            return null; // Aucun utilisateur trouvé
        }

        return new User($tab['id'], $tab['email'], $tab['password'], $tab['role']);
    }
    public function getLastInsertedId(): int{
        return $this->pdo->lastInsertId();
    }
}