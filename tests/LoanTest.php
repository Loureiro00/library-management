<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Loan;
use Application\Domain\Book;
use Application\Domain\User;
use Application\Domain\ValueObjects\ISBN;

class LoanTest extends TestCase {
    public function testLoanCreation() {
        $isbn = new ISBN('1234567890123');
        $book = new Book('PHP for Beginners', 'John Doe',$isbn );
        $user = new User('Jane Doe', 'USR123');
        $loan = new Loan($book, $user, '2024-01-01');

        $this->assertEquals($book, $loan->getBook());
        $this->assertEquals($user, $loan->getUser());
        $this->assertEquals('2024-01-01', $loan->getLoanDate());
        $this->assertNull($loan->getReturnDate());
    }

    public function testLoanReturn() {
        $isbn = new ISBN('1234567890');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $user = new User('Jane Doe', 'USR123');
        $loan = new Loan($book, $user, '2024-01-01');

        $loan->setReturnDate('2024-01-10');
        $this->assertEquals('2024-01-10', $loan->getReturnDate());
    }
}
