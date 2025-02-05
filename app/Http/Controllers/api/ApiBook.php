<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\BookService;

class ApiBook extends Controller{

    private $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = Book::with('category')->get(); // Pastikan relasi dimuat
        return response()->json($books);
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
        response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json($book);    
    }
}