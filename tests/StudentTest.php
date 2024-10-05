<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Student;

class StudentTest extends TestCase {
    public function testStudentCreation() {
        $student = new Student('John Doe', 'STU123', 'ENR456');
        $this->assertEquals('John Doe', $student->getName());
        $this->assertEquals('STU123', $student->getUserId());
        $this->assertEquals('ENR456', $student->getEnrollmentNumber());
    }

    public function testSetEnrollmentNumber() {
        $student = new Student('John Doe', 'STU123', 'ENR456');
        $student->setEnrollmentNumber('ENR789');
        $this->assertEquals('ENR789', $student->getEnrollmentNumber());
    }

    public function testSetStudentName() {
        $student = new Student('John Doe', 'STU123', 'ENR456');
        $student->setName('Jane Smith');
        $this->assertEquals('Jane Smith', $student->getName());
    }
}
