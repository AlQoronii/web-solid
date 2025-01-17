<?php

namespace App\Repositories;

use App\Models\Loan;

interface LoanRepositoryInterface
{
    public function create(array $data): Loan;
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
    public function getById(string $id): ?Loan;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
    public function count();
    public function getAllUsers(): \Illuminate\Database\Eloquent\Collection;
    public function getAllBooks(): \Illuminate\Database\Eloquent\Collection;
}