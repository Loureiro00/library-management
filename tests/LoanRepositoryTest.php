<?php

use PHPUnit\Framework\TestCase;
use Application\Domain\Loan;
use Application\Domain\Book;
use Application\Domain\User;
use Application\Infrastructure\LoanRepository;
use Application\Domain\ValueObjects\ISBN;
class LoanRepositoryTest extends TestCase {
    private $repository;

    protected function setUp(): void {
        $this->repository = new LoanRepository();
        // Limpar o arquivo JSON antes de cada teste
        file_put_contents('storage/loans.json', json_encode([]));
    }

    public function testSaveLoan() {
        $isbn = new ISBN('1234567890');
        $book = new Book('PHP for Beginners', 'John Doe', $isbn);
        $user = new User('Jane Doe', 'USR123');
        $loan = new Loan($book, $user, '2024-01-01');
        $this->repository->save($loan);

        $loans = $this->repository->getAll();
        $this->assertCount(1, $loans);
        $this->assertEquals('PHP for Beginners', $loans[0]['book']);
        $this->assertEquals('Jane Doe', $loans[0]['user']);
        $this->assertEquals('2024-01-01', $loans[0]['loanDate']);
    }
}
