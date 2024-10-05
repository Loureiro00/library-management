<?php
namespace Application\Domain;

class Loan {
    private $book;
    private $user;
    private $loanDate;
    private $returnDate;

    public function __construct(Book $book, User $user, string $loanDate, ?string $returnDate = null) {
        $this->book = $book;
        $this->user = $user;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
    }

    public function getBook(): Book {
        return $this->book;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getLoanDate(): string {
        return $this->loanDate;
    }

    public function getReturnDate(): ?string {
        return $this->returnDate;
    }

    public function setReturnDate(string $returnDate): void {
        $this->returnDate = $returnDate;
    }
}
