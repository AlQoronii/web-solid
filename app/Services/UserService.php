<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getById(string $id): ?User
    {
        return $this->userRepository->getById($id);
    }

    public function update(string $id, array $data): bool
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->userRepository->delete($id);
    }

    public function count()
    {
        return $this->userRepository->count();
    }
}