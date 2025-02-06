<?php

namespace App\Repositories;

use App\Models\Book;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function create(array $data): Book
    {
        return Book::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Book::with('category')->get(); 
    }

    public function getById(string $id): ?Book
    {
        return Book::with('category')->find($id);
    }

    public function update(string $id, array $data): bool
    {
        $book = $this->getById($id);
        if (!$book) {
            return false;
        }
        
        return $book->update($data);
    }

    public function delete(string $id): bool
    {
        $book = $this->getById($id);
        if (!$book) {
            return false;
        }

        return $book->delete();
    }

    public function getLatestBooks(int $limit = 4): Collection
    {
        return Book::latest()->take($limit)->get();
    }
    public function getPaginatedBooks($perPage, $search = null)
    {
        $query = Book::query();

        if ($search) {
            $query->where('book_title', 'like', '%' . $search . '%')
                  ->orWhere('book_author', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('category_name', 'like', '%' . $search . '%');
                  });
        }
        

        return $query->paginate($perPage);
    }
    public function getBookbyCategory(string $category): Collection
    {
        $query = Book::query();

        $query->where('category', function($q) use ($category){
            $q->where('category_name', 'like', '%' . $category . '%');
        });

        return $query->get();
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
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function count()
    {
        return Book::count();
    }
}