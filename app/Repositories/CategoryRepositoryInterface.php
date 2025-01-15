<?php

namespace App\Repositories;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function create(array $data): Category;
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
    public function getById(string $id): ?Category;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
    public function count();
}
