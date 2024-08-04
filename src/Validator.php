<?php

namespace App;
use App\UserStore;

class Validator {


    public function __construct(private UserStore $store)
    {
    
    }

    public function validateUser(string $email, string $pass): bool
    {
        if(!is_array($user = $this->store->getUser($email))) {
            return false;
        }

        if($user['pass'] == $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($email);
        return false;
    }   
}