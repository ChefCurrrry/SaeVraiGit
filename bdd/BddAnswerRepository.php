<?php

namespace Kirankumar\Saes3;

class BddAnswerRepository implements IAnswerRepository{
    private \PDO $pdo;

    public function __construct(Database $bdd, private IUserRepository $userRepository) {
        $this->pdo = $bdd->connect();
    }

    public function saveAnswer(Reponses $reponse): bool {
        $request = "INSERT INTO Reponses (user_id, nom, prenom, age, region, insertion, qualite, soutien) VALUES (:userId, :nom,:prenom,:age,:region,:insertion,:qualite,:soutien)";
        $statement = $this->pdo->prepare($request);
        $statement->bindValue(':userId',$reponse->getUser()->getId());
        $statement->bindValue(':nom',$reponse->getNom());
        $statement->bindValue(':prenom',$reponse->getPrenom());
        $statement->bindValue(':age',$reponse->getAge());
        $statement->bindValue(':region',$reponse->getRegion());
        $statement->bindValue(':insertion',$reponse->getInsertion());
        $statement->bindValue(':qualite',$reponse->getQualite());
        $statement->bindValue(':soutien',$reponse->getSoutien());
        return $statement->execute();
    }

    public function registerTry(Reponses $reponse): bool {
        $request = "INSERT INTO ARepondu(user_id) VALUES(:userId)";
        $stmt = $this->pdo->prepare($request);
        $stmt->bindValue(':userId',$reponse->getUser()->getId());
        return $stmt->execute();
    }
}