<?php

namespace App;

class UserStore 
{
    private array $users = [];

    public function addUser(string $name, string $email, string $pass): bool 
    {
        if(isset($this->users[$email])) {
            throw new \Exception(
                "User with email {$email} already exists."
            );
        }

        if(strlen($pass) < 5) {
            throw new \Exception(
                "Password must be at least 5 characters long."
            );
        }
        
        $this->users[$email] = [
            'name' => $name,
            'email' => $email,
            'pass' => $pass
        ];
        return true;
    }

    public function notifyPasswordFailure(string $email): void 
    {
        if(isset($this->users[$email])) {
            $this->users[$email]['failed'] = time();
        }
    }

    public function getUser(string $email): array{
        return $this->users[$email];
    }
}