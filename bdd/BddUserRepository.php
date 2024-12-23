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
    public function saveUser(User $user): bool{
        $request = "INSERT INTO User (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(":email", $user->getEmail());
        $stmt->bindValue(":password", $user->getPassword());
        return $stmt->execute();

    }

    public function findUserByEmail(string $email): ?User{
        $request = "SELECT email, password FROM User WHERE email = :email";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $tab = $stmt->fetch();

        if ($tab === false) {
            return null; // Aucun utilisateur trouvé
        }

        return new User($tab['email'], $tab['password']);
    }

}