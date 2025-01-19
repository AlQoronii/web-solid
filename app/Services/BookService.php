<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\BookRepositoryInterface;
use Exception;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function createBook(array $data): Book
    {
        try {
            return $this->bookRepository->create($data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getAllBooks()
    {
        try {
            return $this->bookRepository->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getBookById(string $id): ?Book
    {
        try {
            return $this->bookRepository->getById($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateBook(string $id, array $data): bool
    {
        try {
            return $this->bookRepository->update($id, $data);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function deleteBook(string $id): bool
    {
        try {
            return $this->bookRepository->delete($id);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function count()
    {
        try {
            return $this->bookRepository->count();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
