<?php

namespace Kirankumar\Saes3;

interface IAnswerRepository{
    public function saveAnswer(Reponses $reponse): bool;
    public function registerTry(Reponses $reponse): bool;

}