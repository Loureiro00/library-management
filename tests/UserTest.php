<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\User;

class UserTest extends TestCase {
    public function testUserCreation() {
        $user = new User('Jane Doe', 'USR123');
        $this->assertEquals('Jane Doe', $user->getName());
        $this->assertEquals('USR123', $user->getUserId());
    }

    public function testSetUserName() {
        $user = new User('Jane Doe', 'USR123');
        $user->setName('John Smith');
        $this->assertEquals('John Smith', $user->getName());
    }

    public function testSetUserId() {
        $user = new User('Jane Doe', 'USR123');
        $user->setUserId('USR456');
        $this->assertEquals('USR456', $user->getUserId());
    }
}
