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

// php vendor/bin/phpunit tests/CartTest.php --colors --testdox
// php vendor/bin/phpunit tests/UserStoreTest.php --colors --testdox




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
        $this->assertNotEquals('Dragans', $user['name']);
        $this->assertEquals('12345', $user['pass']);
    }

    public function testAddUserWithExistingEmailThrowsException(): void 
    {
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '12345');
        $this->expectException(\Exception::class);
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '12345');
    }

    public function testNotifyPasswordFailureUpdatesCount(): void {
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '12345');
        $this->store->notifyPasswordFailure('draganvujic29@gmail.com');
        $user = $this->store->getUser('draganvujic29@gmail.com');
        $this->assertArrayHasKey('failed', $user);
        $this->assertNotNull($user['failed']);
    }
}