<?php


namespace App\Tests;

use App\UserStore;
use PHPUnit\Framework\TestCase;
use App\Validator;

class ValidateTest extends TestCase
{
    private Validator $validator;

    protected function setUp(): void 
    {
        $store = new UserStore();
        $store->addUser('dragan', 'draganvujic29@gmail.com', '123456');
        $this->validator = new Validator($store);
    }

    public function testValidateCorrectPass(): void 
    {
        $this->assertTrue(
            $this->validator->validateUser('draganvujic29@gmail.com', '123456'),
            'Exception successfull validation');
    }
}