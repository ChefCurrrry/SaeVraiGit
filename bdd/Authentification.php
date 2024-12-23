<?php

namespace Kirankumar\Saes3;



use Kirankumar\Saes3\Exceptions\AuthentificationException;

class Authentification{

    public function __construct(private IUserRepository $userRepository) { }

    /**
     * @throws AuthentificationException
     */
    public function enregistrer(string $email, string $password, string $repeat): bool {
        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new AuthentificationException("L'adresse email est invalide.");
        }

        // Vérifier si l'utilisateur existe déjà
        if ($this->userRepository->findUserByEmail($email)) {
            throw new AuthentificationException("Un utilisateur avec cet email existe déjà.");
        }

        // Validation du mot de passe
        if (strlen($password) < 8) {
            throw new AuthentificationException("Le mot de passe doit contenir au moins 8 caractères.");
        }

        if (!preg_match('/[A-Z]/', $password)) {
            throw new AuthentificationException("Le mot de passe doit contenir au moins une lettre majuscule.");
        }

        if (!preg_match('/[a-z]/', $password)) {
            throw new AuthentificationException("Le mot de passe doit contenir au moins une lettre minuscule.");
        }

        if (!preg_match('/[0-9]/', $password)) {
            throw new AuthentificationException("Le mot de passe doit contenir au moins un chiffre.");
        }

        if (!preg_match('/[\W_]/', $password)) {
            throw new AuthentificationException("Le mot de passe doit contenir au moins un caractère spécial.");
        }

        // Vérification que les deux mots de passe correspondent
        if ($password !== $repeat) {
            throw new AuthentificationException("Les mots de passe ne correspondent pas.");
        }

        // Si tout est valide, créer un utilisateur
        $user = new User($email, password_hash($password, PASSWORD_BCRYPT));

        // Enregistrer l'utilisateur dans le dépôt
        return $this->userRepository->saveUser($user);
    }

    /**
     * @param string $email
     *@param string $password
     *@throws AuthentificationException
     */
    public function authentifier(string $email, string $password): string {
        // Validation de l'email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new AuthentificationException("L'adresse email est invalide.");
        }

        // Récupération de l'utilisateur dans la base de données
        $user = $this->userRepository->findUserByEmail($email);

        if (!$user) {
            throw new AuthentificationException("Aucun utilisateur trouvé avec cette adresse email.");
        }

        // Vérification du mot de passe
        if (!password_verify($password, $user->getPassword())) {
            throw new AuthentificationException("Le mot de passe est incorrect.");
        }

        // Retourner l'identifiant de l'utilisateur ou un jeton d'authentification
        return $this->userRepository->getIdOfUser($user);
    }


}