<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\User;
use Application\Infrastructure\UserRepository;

class UserRepositoryTest extends TestCase {
    private $repository;

    protected function setUp(): void {
        $this->repository = new UserRepository();
        // Limpar o arquivo JSON antes de cada teste
        file_put_contents('storage/users.json', json_encode([]));
    }

    public function testSaveUser() {
        $user = new User('Jane Doe', 'USR123');
        $this->repository->save($user);

        $users = $this->repository->getAll();
        $this->assertCount(1, $users);
        $this->assertEquals('Jane Doe', $users[0]['name']);
        $this->assertEquals('USR123', $users[0]['userId']);
    }
}
