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

    public function getPaginatedBooks($perPage, $search = null)
    {
        $query = Book::query();

        if ($search) {
            $query->where('book_title', 'like', '%' . $search . '%')
                  ->orWhere('book_author', 'like', '%' . $search . '%')
                  ->orWhere('book_publisher', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('category_name', 'like', '%' . $search . '%');
                  });
        }
        

        return $query->paginate($perPage);
    }

    public function searchBook($search = null): \Illuminate\Database\Eloquent\Collection
    {
        $query = Book::query();
        try {
            if($search){
                $query->where('book_title', 'like', '%' . $search . '%')
                      ->orWhere('book_author', 'like', '%' . $search . '%')
                      ->orWhere('book_publisher', 'like', '%' . $search . '%')
                      ->orWhereHas('category', function ($q) use ($search) {
                          $q->where('category_name', 'like', '%' . $search . '%');
                      });
                return $query->get();
            }

            return $query->get();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getLatestBooks(int $limit = 4): \Illuminate\Database\Eloquent\Collection
    {
        try {
            return $this->bookRepository->getLatestBooks($limit);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
