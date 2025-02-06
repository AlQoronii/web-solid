<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;

class LoanRepository implements LoanRepositoryInterface
{
    public function create(array $data): Loan
    {
        return Loan::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Loan::with('user', 'book')->get();
    }

    public function getById(string $id): ?Loan
    {
        return Loan::with('user','book')->find($id);
    }

    public function update(string $id, array $data): bool
    {
        return Loan::find($id)->update($data);
    }

    public function delete(string $id): bool
    {
        return Loan::destroy($id);
    }

    public function count()
    {
        return Loan::count();
    }

    public function getAllUsers(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    public function getAllBooks(): \Illuminate\Database\Eloquent\Collection
    {
        return Book::all();
    }
}