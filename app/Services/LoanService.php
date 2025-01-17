<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\LoanRepositoryInterface;
use App\Models\Loan;
use App\Models\User;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function create(array $data): Loan
    {
        return $this->loanRepository->create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->loanRepository->getAll();
    }

    public function getById(string $id): ?Loan
    {
        return $this->loanRepository->getById($id);
    }

    public function update(string $id, array $data): bool
    {
        return $this->loanRepository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->loanRepository->delete($id);
    }

    public function count()
    {
        return $this->loanRepository->count();
    }

    public function getAllUsers()
    {
        return $this->loanRepository->getAllUsers();
    }

    public function getAllBooks()
    {
        return $this->loanRepository->getAllBooks();
    }
}