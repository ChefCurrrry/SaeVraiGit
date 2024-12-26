<?php

namespace Kirankumar\Saes3;

class Reponses{


    // Constructeur
    public function __construct(private User $user, private string $nom, private string $prenom, private int $age, private string $region, private string $insertion, private string $qualite, private string $soutien){ }
    public function getUser() : User{ return $this->user; }
    public function getNom(): string{ return $this->nom; }
    public function getPrenom(): string{ return $this->prenom; }
    public function getAge(): int{ return $this->age; }
    public function getRegion(): string{ return $this->region; }
    public function getInsertion(): string{ return $this->insertion; }
    public function getQualite(): string{ return $this->qualite; }
    public function getSoutien(): string{ return $this->soutien; }

}