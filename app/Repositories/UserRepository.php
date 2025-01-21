<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    public function getById(string $id): ?User
    {
        return User::find($id);
    }

    public function update(string $id, array $data): bool
    {
        $user = $this->getById($id);
        if (!$user) {
            return false;
        }
        
        try {
            return $user->update($data);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete(string $id): bool
    {
        $user = $this->getById($id);
        if (!$user) {
            return false;
        }

        return $user->delete();
    }

    public function count()
    {
        return User::count();
    }

    public function getAllRoles(): \Illuminate\Database\Eloquent\Collection
    {
        return Role::all();
    }
}