<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data): User
    {
        try {
            return $this->userRepository->create($data);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getAll()
    {
        try {
            return $this->userRepository->getAll();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getById(string $id): ?User
    {
        try {
            return $this->userRepository->getById($id);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function update(string $id, array $data): bool
    {
        try {
            $user = $this->getById($id);
            if (!empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                $data['password'] = $user->password;
            }

            return $this->userRepository->update($id, $data);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function delete(string $id): bool
    {
        try {
            return $this->userRepository->delete($id);
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function count()
    {
        try {
            return $this->userRepository->count();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }

    public function getAllRoles()
    {
        try {
            return $this->userRepository->getAllRoles();
        } catch (Exception $e) {
            // Handle exception
            throw $e;
        }
    }
}