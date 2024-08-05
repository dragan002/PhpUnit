<?php

namespace App\Tests;

use App\UserStore;
use App\User;
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
        $this->store = new UserStore();
    }

    protected function tearDown(): void {

    }

    public function testGetUser() 
    {
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '1234567');
        $user = $this->store->getUser('draganvujic29@gmail.com');
        $this->assertEquals($user->getEmail(), 'draganvujic29@gmail.com');
        $this->assertEquals($user->getPass(), '1234567');
        $this->assertEquals($user->getName(), 'Dragan');



        // $this->store->addUser('dragan', 'draganvujic29@gmail.com', '1234567');
        // $user = $this->store->getUser('draganvujic29@gmail.com');
        // $this->assertEquals($user['name'], 'dragan');
        // $this->assertEquals($user['pass'], '1234567');
    }

    public function testAddUserWithExistingEmailThrowsException(): void 
    {
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '1234567');
        $this->expectException(\Exception::class);
        $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '1234567');
    }

    // public function testNotifyPasswordFailureUpdatesCount(): void {
    //     $this->store->addUser('Dragan', 'draganvujic29@gmail.com', '1234567');
    //     $this->store->notifyPasswordFailure('draganvujic29@gmail.com');
    //     $user = $this->store->getUser('draganvujic29@gmail.com');
    //     $this->assertArrayHasKey('failed', $user);
    //     $this->assertNotNull($user['failed']);
    // }

//     // public function testAddUserShortPass()
//     // {
//     //     try {
//     //         $this->store->addUser('dragan', 'draganvujic29@gmail.com', '123');
            
//     //     } catch(\Exception $e) {
//     //         $user = $this->store->getUser('draganvujic29@gmail.com');
//     //         $this->assertEquals('123', $user['pass']);
//     //         return;
//     //     }
//     //     $this->fail('Short password exception excepted');
//     // }

//     public function testAddUserShortPass(): void 
//     {
//         $this->expectException(\Exception::class);
//         $this->store->addUser('dragan', 'draganvujic29@gmail', 'ff');
//     }


//     public function testAddUserDuplicate(): void
//     {
//         $this->expectException(\Exception::class); // Expecting an exception of type Exception
//         $this->expectExceptionMessage("User with email draganvujic29@gmail.com already exists."); // Specific message expected
    
//         $store = new UserStore();
//         $store->addUser('dragan vujic', 'draganvujic29@gmail.com', 'password123'); // First addition
//         $store->addUser('dragan vujic', 'draganvujic29@gmail.com', 'password123'); // Second addition, should throw exception
//     }
    
}

