<?php
namespace Application\Infrastructure;

use Application\Domain\User;

class UserRepository {
    private $file = 'storage/users.json';

    public function getAll(): array {
        if (!file_exists($this->file)) {
            return [];
        }
        return json_decode(file_get_contents($this->file), true);
    }

    public function save(User $user): void {
        $users = $this->getAll();
        $users[] = [
            'name' => $user->getName(),
            'userId' => $user->getUserId()
        ];
        file_put_contents($this->file, json_encode($users));
    }
}
