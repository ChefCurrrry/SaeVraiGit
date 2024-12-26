<?php

namespace Kirankumar\Saes3;

class User{
    public function __construct(private int $id, private string $email, private string $password, private bool $isAdmin) { }

    public function getId(): int{
        return $this->id;
    }

    public function getEmail() : string {
        return $this->email;
    }
    public function getPassword() : string {
        return $this->password;
    }
    public function isAdmin() : bool {
        return $this->isAdmin;
    }


}