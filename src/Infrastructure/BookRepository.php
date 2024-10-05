<?php
namespace Application\Infrastructure;


use Application\Domain\Book;
use Application\Domain\ISBN;


class BookRepository {
    private $file = 'storage/books.json';

    public function getAll(): array {
        if (!file_exists($this->file)) {
            return [];
        }
        return json_decode(file_get_contents($this->file), true);
    }

    public function save(Book $book): void {
        $books = $this->getAll();
        $books[] = [
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'isbn' => (string) $book->getIsbn(),
            'available' => $book->isAvailable()
        ];
        file_put_contents($this->file, json_encode($books));
    }

    public function remove(string $isbn): void {
        $books = $this->getAll();
        foreach ($books as $index => $book) {
            if ($book['isbn'] === $isbn) {
                unset($books[$index]);
            }
        }
        file_put_contents($this->file, json_encode(array_values($books)));
    }
}
