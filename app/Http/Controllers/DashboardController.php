<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\LoanService;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $userService;
    protected $bookService;
    protected $categoryService;
    protected $loanService;
    protected $articleService;

    public function __construct(
        UserService $userService,
        BookService $bookService,
        CategoryService $categoryService,
        LoanService $loanService,
        ArticleService $articleService
    ) {
        $this->userService = $userService;
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->loanService = $loanService;
        $this->articleService = $articleService;
    }

    public function index()
    {
        $usersCount = $this->userService->count();
        $booksCount = $this->bookService->count();
        $categoriesCount = $this->categoryService->count();
        $loansCount = $this->loanService->count();
        $articlesCount = $this->articleService->count();

        return view('pages.dashboard', [
            'usersCount' => $usersCount,
            'booksCount' => $booksCount,
            'categoriesCount' => $categoriesCount,
            'loansCount' => $loansCount,
            'articlesCount' => $articlesCount,
        ]);
    }
}