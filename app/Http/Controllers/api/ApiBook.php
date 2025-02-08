<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use Symfony\Component\HttpFoundation\Request;

class ApiBook extends Controller{

    private $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        $books = $this->bookService->getAllBooks(); // Pastikan relasi dimuat
        // $books = $this->bookService->getPaginatedBooks();
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