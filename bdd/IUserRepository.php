<?php

namespace Kirankumar\Saes3;


interface IUserRepository {
    public function saveUser(User $user): bool;
    public function findUserByEmail(string $email): ?User;
}