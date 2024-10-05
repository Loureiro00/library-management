<?php
namespace Application;

use Application\Domain\Book;
use Application\Domain\User;
use Application\Domain\Loan;
use Application\Infrastructure\BookRepository;
use Application\Infrastructure\UserRepository;
use Application\Infrastructure\LoanRepository;

class LibraryService {
    private $bookRepo;
    private $userRepo;
    private $loanRepo;

    public function __construct(BookRepository $bookRepo, UserRepository $userRepo, LoanRepository $loanRepo) {
        $this->bookRepo = $bookRepo;
        $this->userRepo = $userRepo;
        $this->loanRepo = $loanRepo;
    }

    public function addBook(Book $book): void {
        $this->bookRepo->save($book);
    }

    public function removeBook(string $isbn): void {
        $this->bookRepo->remove($isbn);
    }

    public function listBooks(): array {
        return $this->bookRepo->getAll();
    }

    public function registerUser(User $user): void {
        $this->userRepo->save($user);
    }

    public function lendBook(Book $book, User $user): void {
        if ($book->isAvailable()) {
            $book->lend();
            $loan = new Loan($book, $user, date('Y-m-d'));
            $this->loanRepo->save($loan);
        }
    }

    public function returnBook(Loan $loan): void {
        $loan->getBook()->returnBook();
        $loan->setReturnDate(date('Y-m-d'));
        $this->loanRepo->save($loan);
    }
}
