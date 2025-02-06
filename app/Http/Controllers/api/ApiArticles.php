<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ArticleService;

class ApiArticles extends Controller{
    private $articlesService;
    public function __construct(ArticleService $articlesService)
    {
        $this->articlesService = $articlesService;
    }
    
    public function index(){
        $articles = $this->articlesService->getAllArticles(); // Pastikan relasi dimuat
        return response()->json($articles);
    }

    public function show($id){
        $article = $this->articlesService->getArticleById($id);
        if (!$article) {
            response()->json(['message' => 'Article not found'], 404);
        }
        return response()->json($article);    
    }
    

    
}

?>