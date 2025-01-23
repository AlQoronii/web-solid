<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Services\HomeService;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    private HomeService $homeService;
    private CategoryService $categoryService;


    public function __construct(HomeService $homeService, CategoryService $categoryService)
    {
        $this->homeService = $homeService;
        $this->categoryService = $categoryService;
    }

    public function index(): Response
    {
        $books = $this->homeService->getLatestBooks();
        $allBooks = $this->homeService->getAllBooks();
        $articles = $this->homeService->getLatestArticles();
        $categories = $this->categoryService->getAllCategories();
        return response()->view('pages.landing-page.index',[
            'books' => $books,
            'allBooks' => $allBooks,
            'categories' => $categories,
            // 'articles' => $articles
        ]);
            
    }
}
