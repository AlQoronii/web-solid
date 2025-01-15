<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\BookRepositoryInterface;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function createBook(array $data): Book
    {
        return $this->bookRepository->create($data);
    }

    public function getAllBooks()
    {
        return $this->bookRepository->getAll();
    }

    public function getBookById(string $id): ?Book
    {
        return $this->bookRepository->getById($id);
    }

    public function updateBook(string $id, array $data): bool
    {
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook(string $id): bool
    {
        return $this->bookRepository->delete($id);
    }

    public function count()
    {
        return $this->bookRepository->count();
    }
}
