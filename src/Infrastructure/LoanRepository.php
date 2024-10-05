<?php
namespace Application\Infrastructure;

use Application\Domain\Loan;

class LoanRepository {
    private $file = 'storage/loans.json';

    public function getAll(): array {
        if (!file_exists($this->file)) {
            return [];
        }
        return json_decode(file_get_contents($this->file), true);
    }

    public function save(Loan $loan): void {
        $loans = $this->getAll();
        $loans[] = [
            'book' => $loan->getBook()->getTitle(),
            'user' => $loan->getUser()->getName(),
            'loanDate' => $loan->getLoanDate(),
            'returnDate' => $loan->getReturnDate(),
        ];
        file_put_contents($this->file, json_encode($loans));
    }
}
