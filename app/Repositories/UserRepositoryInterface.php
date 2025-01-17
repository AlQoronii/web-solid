<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
    public function getById(string $id): ?User;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
    public function count();
    public function getAllRoles(): \Illuminate\Database\Eloquent\Collection;
}