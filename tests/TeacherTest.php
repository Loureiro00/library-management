<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Teacher;

class TeacherTest extends TestCase {
    public function testTeacherCreation() {
        $teacher = new Teacher('Jane Doe', 'TCH123', 'Mathematics');
        $this->assertEquals('Jane Doe', $teacher->getName());
        $this->assertEquals('TCH123', $teacher->getUserId());
        $this->assertEquals('Mathematics', $teacher->getSpecialization());
    }

    public function testSetSpecialization() {
        $teacher = new Teacher('Jane Doe', 'TCH123', 'Mathematics');
        $teacher->setSpecialization('Physics');
        $this->assertEquals('Physics', $teacher->getSpecialization());
    }

    public function testSetTeacherName() {
        $teacher = new Teacher('Jane Doe', 'TCH123', 'Mathematics');
        $teacher->setName('John Smith');
        $this->assertEquals('John Smith', $teacher->getName());
    }
}
