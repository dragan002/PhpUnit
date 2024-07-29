<?php

namespace App\Tests;

use App\UserStore;
use PHPUnit\Framework\TestCase;

// $store = new UserStore();

// $store->addUser(
//     'John Doe',
//     'john@example.com',
//     'password123'
// );

// $store->notifyPasswordFailure('john@example.com');
// $user->getUser('john@example.com');

// print_r($store);


class UserStoreTest extends TestCase 
{
    private UserStore $store;

    protected function setUp(): void {
        $this->store = new userStore();
    }

    protected function tearDown(): void {

    }

    public function testGetUser(): void 
    {
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '12345');
        $user = $this->store->getUser('draganvujic29@gmail.com');
        $this->assertEquals("draganvujic29@gmail.com", $user['email']);
        $this->assertEquals('Dragan', $user['name']);
        $this->assertEquals('12345', $user['pass']);
    }
}