<?php
namespace Application\Domain;

use Application\Domain\ValueObjects\ISBN;

class Book {
    private $title;
    private $author;
    private $isbn;
    private $available = true;

    public function __construct(string $title, string $author, ISBN $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getIsbn(): ISBN {
        return $this->isbn;
    }

    public function isAvailable(): bool {
        return $this->available;
    }

    public function lend(): void {
        if ($this->available) {
            $this->available = false;
        } else {
            throw new \Exception('Book not available for lending.');
        }
    }

    public function returnBook(): void {
        $this->available = true;
    }
}
