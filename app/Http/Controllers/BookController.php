<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Services\Interfaces\RepositoryService;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Repositories\BookRepository;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\Contracts\FileUploadServiceInterface;
use App\Services\Notifications\NotificationPusher;
use Faker\Core\File;

class BookController extends Controller
{
    private $bookService;
    private $notificationPusher;
    private $fileUploadService;
    private $categoryService;
    public function __construct(BookService $bookService, NotificationPusher $notificationPusher, FileUploadServiceInterface $fileUploadService, CategoryService $categoryService)
    {
        $this->bookService = $bookService;
        $this->notificationPusher = $notificationPusher;
        $this->fileUploadService = $fileUploadService;
        $this->categoryService = $categoryService;
    }


    public function index(Request $request)
    {
        $breadcrumb = [
            'list' => ['Home', 'Books'],
            'url' => ['/', '/books']
        ];

        $perPage = $request->get('perPage', 5);
        $search = $request->get('search');
        // $category = Category::all();
        $category = $this->categoryService->getAllCategories();
        $books = $this->bookService->getPaginatedBooks($perPage, $search);
        response()->json($books);
        return view('pages.book.index', compact('books', 'category', 'perPage', 'search', 'breadcrumb'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.book.create', ['categories' => $categories, 'extension' => 'jpg, jpeg, png, gif']);
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $data['book_image'] = $this->fileUploadService->uploadFile($request->file('book_image'), 'books/images');
        $book = $this->bookService->createBook($data);

        $this->notificationPusher->success('Book created successfully', ['book' => $book]);
        session()->flash('success', 'Data berhasil disimpan!');
        return redirect()->route('books.index')->with('success', 'Book created successfully');
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
        try {
            $book = $this->bookService->getBookById($id);
            $data = $request->validated();

            if ($request->hasFile('book_image')) {
                if (!empty($book->book_image)) {
                    $this->fileUploadService->deleteFile('books/images/' . $book->book_image);
                }
                $data['book_image'] = $this->fileUploadService->uploadFile($request->file('book_image'), 'books/images');
            }

            $book = $this->bookService->updateBook($id, $data);

            $this->notificationPusher->success('Book updated successfully', ['book' => $book]);
            return redirect()->route('books.index')->with('success', 'Book updated successfully');
        } catch (\Exception $e) {
            $this->notificationPusher->error('Failed to update book', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Failed to update book: ' . $e->getMessage()]);
        }
    }


    public function destroy(string $id)
    {
        $book = $this->bookService->deleteBook($id);

        $this->notificationPusher->success('Book deleted successfully', ['book' => $book]);
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }

}