<?php

namespace App\Repositories;

use App\Models\Book;

interface BookRepositoryInterface
{
    public function create(array $data): Book;
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
    public function getById(string $id): ?Book;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
    public function getLatestBooks(): \Illuminate\Database\Eloquent\Collection;
    public function count();
}