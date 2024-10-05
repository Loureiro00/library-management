<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Book;
use Application\Domain\ValueObjects\ISBN;
use Application\Infrastructure\BookRepository;

class BookRepositoryTest extends TestCase {
    private $repository;

    protected function setUp(): void {
        $this->repository = new BookRepository();
        file_put_contents('storage/books.json', json_encode([]));
    }

    public function testSaveBook() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $this->repository->save($book);

        $books = $this->repository->getAll();
        $this->assertCount(1, $books);
        $this->assertEquals('PHP for Beginners', $books[0]['title']);
        $this->assertEquals('John Doe', $books[0]['author']);
        $this->assertEquals('1234567890123', $books[0]['isbn']);
    }

    public function testRemoveBook() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $this->repository->save($book);

        $this->repository->remove('1234567890123');
        $books = $this->repository->getAll();
        $this->assertCount(0, $books);
    }
}
