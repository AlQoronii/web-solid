<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    private HomeService $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function index(): Response
    {
        $books = $this->homeService->getLatestBooks();
        $articles = $this->homeService->getLatestArticles();

        return response()->view('pages.landing-page.index',[
            'books' => $books,
            'articles' => $articles
        ]);
            
    }
}
