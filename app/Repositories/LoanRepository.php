<?php

namespace App\Repositories;

use App\Models\Loan;

class LoanRepository implements LoanRepositoryInterface
{
    public function create(array $data): Loan
    {
        return Loan::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Loan::all();
    }

    public function getById(string $id): ?Loan
    {
        return Loan::find($id);
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
}