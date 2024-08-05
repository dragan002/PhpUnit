<?php

namespace App;

use App\User;


class UserStore 
{
    private array $users = [];

    public function addUser(string $name, string $email, string $pass): bool 
    {
        $email = trim($email); // Normalize the email to prevent errors related to formatting

        if (isset($this->users[$email])) {
            throw new \Exception("User with email {$email} already exists.");
        }

        if (strlen($pass) < 6) { // Ensure password is at least 6 characters long
            throw new \Exception("Password must be at least 6 characters long.");
        }
        
        $this->users[$email] = new User($name, $email, $pass);
        // $this->users[$email] = [
        //     'name' => $name,
        //     'email' => $email,
        //     'pass' => $pass,
        //     ];
        return true;
    }

    public function notifyPasswordFailure(string $email): void 
    {
        if (isset($this->users[$email])) {
            $this->users[$email]['failed'] = time();
        }
    }

    public function getUser(string $email): object 
    {
        if(!isset($this->users[$email])) {
            return null;
        }

        return $this->users[$email];
    }
}
