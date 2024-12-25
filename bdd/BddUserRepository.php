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
        $request = "INSERT INTO User (email, password, admin) VALUES (:email, :password, :isAdmin)";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(":email", $user->getEmail());
        $stmt->bindValue(":password", $user->getPassword());
        $stmt->bindValue(":isAdmin", $user->isAdmin(), PDO::PARAM_BOOL);
        return $stmt->execute();

    }

    /**
     * Cherche l'utilisateur lors de la connexion
     * @param string $email
     * @return User|null
     */
    public function findUserByEmail(string $email): ?User{
        $request = "SELECT email, password, admin FROM User WHERE email = :email";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $tab = $stmt->fetch();

        if ($tab === false) {
            return null; // Aucun utilisateur trouvé
        }

        return new User($tab['email'], $tab['password'], $tab['admin']);
    }

    /**
     * Retourne l'id de l'utilisateur spécifié
     * @param User $user
     * @return int
     */
    public function getIdOfUser(User $user): int{
        $request = "SELECT id FROM User WHERE email = :email";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':email', $user->getEmail());
        return $stmt->execute();
    }
}