<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Book;
use Application\Domain\ValueObjects\ISBN;

class BookTest extends TestCase {
    public function testBookCreation() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);

        $this->assertEquals('PHP for Beginners', $book->getTitle());
        $this->assertEquals('John Doe', $book->getAuthor());
        $this->assertEquals($isbn, $book->getIsbn());
        $this->assertTrue($book->isAvailable());
    }

    public function testInvalidISBN() {
        $this->expectException(\InvalidArgumentException::class);
        new ISBN('invalid-isbn');
    }

    public function testBookLending() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $book->lend();

        $this->assertFalse($book->isAvailable());
    }

    public function testBookReturning() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $book->lend();
        $book->returnBook();

        $this->assertTrue($book->isAvailable());
    }
}
