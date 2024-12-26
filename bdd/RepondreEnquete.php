<?php

namespace Kirankumar\Saes3;

class RepondreEnquete{
    public function __construct(private IAnswerRepository $answerRepository){}
    public function enregistrerReponse(User $user, string $nom, string $prenom, int $age, string $region, string $insertion, string $qualite, string $soutien): bool{
        $reponse = new Reponses($user, $nom, $prenom, $age, $region,$insertion,$qualite, $soutien);
        $this->answerRepository->registerTry($reponse);
        return $this->answerRepository->saveAnswer($reponse);
    }

}