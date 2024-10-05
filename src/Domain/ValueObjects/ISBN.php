<?php
namespace Application\Domain\ValueObjects;
class ISBN {
    private $isbn;

    public function __construct(string $isbn) {
        if (!$this->isValidISBN($isbn)) {
            throw new \InvalidArgumentException("Invalid ISBN format.");
        }
        $this->isbn = $isbn;
    }

    public function __toString(): string {
        return $this->isbn;
    }

    private function isValidISBN(string $isbn): bool {
        // Validação simples de ISBN-10 ou ISBN-13
        return preg_match('/^\d{10}(\d{3})?$/', $isbn) === 1;
    }
}
