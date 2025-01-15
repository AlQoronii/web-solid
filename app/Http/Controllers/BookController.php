<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\Interfaces\RepositoryService;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Repositories\BookRepository;
use App\Services\BookService;
use App\Services\Notifications\NotificationPusher;

class BookController extends Controller
{
    private $bookService;
    private $notificationPusher;

    public function __construct(BookService $bookService, NotificationPusher $notificationPusher)
    {
        $this->bookService = $bookService;
        $this->notificationPusher = $notificationPusher;
    }

    public function index()
    {
        $category = Category::all();
        $book = $this->bookService->getAllBooks();
        response()->json($book);
        return view('pages.book.index', compact('book', 'category'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.book.create', ['categories' => $categories]);
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();

        $book = $this->bookService->createBook($data);

        $this->notificationPusher->success('Book created successfully', ['book' => $book]);
        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('pages.book.edit', compact('book', 'categories'));
    }

    public function show($id)
    {
        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return $this->notificationPusher->warning('Book Not Found', ['article' => $book]);
        }
        response()->json($book);
        return view('pages.book.show', ['book' => $book]);
    }

    public function update(BookRequest $request, string $id)
    {
        $data = $request->validated();

        $book = $this->bookService->updateBook($id, $data);

        $this->notificationPusher->success('Book updated successfully', ['book' => $book]);
        return redirect()->route('books.index');
    }

    public function destroy(string $id)
    {
        $book = $this->bookService->deleteBook($id);

        $this->notificationPusher->success('Book deleted successfully', ['book' => $book]);
        return redirect()->route('books.index');
    }

}