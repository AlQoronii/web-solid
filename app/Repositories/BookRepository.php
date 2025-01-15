<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function create(array $data): Book
    {
        return Book::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Book::all();
    }

    public function getById(string $id): ?Book
    {
        return Book::find($id);
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

    public function getLatestBooks(): Collection
    {
        return Book::latest()->take(5)->get();
    }

    public function count()
    {
        return Book::count();
    }
}