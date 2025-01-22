<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\LoanRepositoryInterface;
use App\Models\Loan;
use App\Models\User;
use Exception;

class LoanService
{
    protected $loanRepository;

    public function __construct(LoanRepositoryInterface $loanRepository)
    {
        $this->loanRepository = $loanRepository;
    }

    public function create(array $data): Loan
    {
        try {
            return $this->loanRepository->create($data);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        try {
            return $this->loanRepository->getAll();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getById(string $id): ?Loan
    {
        try {
            return $this->loanRepository->getById($id);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function update(string $id, array $data): bool
    {
        try {
            return $this->loanRepository->update($id, $data);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function delete(string $id): bool
    {
        try {
            return $this->loanRepository->delete($id);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function count()
    {
        try {
            return $this->loanRepository->count();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getAllUsers()
    {
        try {
            return $this->loanRepository->getAllUsers();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getAllBooks()
    {
        try {
            return $this->loanRepository->getAllBooks();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getPaginateLoan($perPage, $search = null)
    {
        $query = Loan::query();

        if($search) {
            $query->where('loan_status', 'like', '%' . $search . '%')
            ->orWhereHas('user', function($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%');
            })
            ->orWhereHas('book', function($query) use ($search) {
                $query->where('book_title', 'like', '%' . $search . '%');
            });
        }

        return $query->paginate($perPage);

    }
}