<?php
namespace Application\Domain;

class Student extends User {
    private $enrollmentNumber;

    public function __construct(string $name, string $userId, string $enrollmentNumber) {
        parent::__construct($name, $userId);
        $this->enrollmentNumber = $enrollmentNumber;
    }

    public function getEnrollmentNumber(): string {
        return $this->enrollmentNumber;
    }

    public function setEnrollmentNumber(string $enrollmentNumber): void {
        $this->enrollmentNumber = $enrollmentNumber;
    }
}
