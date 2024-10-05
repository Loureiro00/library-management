<?php
namespace Application\Domain;


class Teacher extends User {
    private $specialization;

    public function __construct(string $name, string $userId, string $specialization) {
        parent::__construct($name, $userId);
        $this->specialization = $specialization;
    }

    public function getSpecialization(): string {
        return $this->specialization;
    }

    public function setSpecialization(string $specialization): void {
        $this->specialization = $specialization;
    }
}
