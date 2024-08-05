<?php

namespace App;
use App\UserStore;

class Validator {


    public function __construct(private UserStore $store)
    {
    
    }

    public function validateUser(string $email, string $pass): bool

    {
        $user = $this->store->getUser($email);
        if (is_null($user)) {
            return false;
        }

        $testPass = $user->getPass();
        if($testPass == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($email);
        return false;

    }
}