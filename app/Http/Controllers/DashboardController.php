<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Services\UserService;
use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\LoanService;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $breadcrumb = [
            'list' => ['Home', 'Dashboard'],
            'url' => ['/', '/dashboard']
        ];

        
    // return view('pages.dashboard', compact('booksCount', 'usersCount', 'loansCount', 'articlesCount', 'loanDates', 'loanCounts'));

        return view('pages.dashboard', compact('breadcrumb'));
    }

    public function data(){
        $usersCount = $this->userService->count();
        $booksCount = $this->bookService->count();
        $categoriesCount = $this->categoryService->count();
        $loansCount = $this->loanService->count();
        $articlesCount = $this->articleService->count();

        $booksCount = Book::count();

        $usersCount = User::count();

        $loansCount = Loan::count();

        $articlesCount = Article::count();

        $booksCountByCategory = Book::select('categories.category_name', DB::raw('count(*) as total'))
            ->join('categories', 'books.category_id', '=', 'categories.category_id')
            ->groupBy('categories.category_name')
            ->get()
            ->pluck('total', 'category_name');

        $loanDates = Loan::selectRaw('DATE(created_at) as created_date')->groupBy('created_date')->pluck('created_date');

        $loanCounts = Loan::selectRaw('COUNT(*) as count')
        ->groupByRaw('DATE(created_at)')
        ->pluck('count');

        // dd($loanCounts);
        $loanDetails = Loan::select('user_id', 'book_id', 'borrow_date', 'return_date', 'loan_status')->get();

        $data = [
            'usersCount' => $usersCount,
            'booksCount' => $booksCount,
            'categoriesCount' => $categoriesCount,
            'loansCount' => $loansCount,
            'articlesCount' => $articlesCount,
            'loanDates' => $loanDates,
            'loanCounts' => $loanCounts,
            'loanDetails' => $loanDetails,
            'booksCountByCategory' => $booksCountByCategory
        ];

        return response()->json($data, 200);
    }
}