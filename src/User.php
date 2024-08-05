<?php

namespace App;

class User {

    private string $pass;
    private ?string $failed;

    public function __construct(private string $name, private string $email, string $pass)
    {
        if(strlen($pass) < 5) {
            throw new \Exception('Password must be at least 6 characters');
        }
        $this->pass = $pass;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPass(): string 
    {
        return $this->pass;
    }

    public function failed(string $time): void
    {
        $this->failed = $time;
    }

}