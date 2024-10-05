<?php
namespace Application\Domain;


class User extends Person {
    private $userId;

    public function __construct(string $name, string $userId) {
        parent::__construct($name);
        $this->userId = $userId;
    }

    public function getUserId(): string {
        return $this->userId;
    }

    public function setUserId(string $userId): void {
        $this->userId = $userId;
    }
}
