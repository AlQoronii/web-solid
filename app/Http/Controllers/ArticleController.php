<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\Notifications\NotificationPusher;

class ArticleController extends Controller
{
    protected $articleService;
    protected $notificationPusher;

    public function __construct(ArticleService $articleService, NotificationPusher $notificationPusher)
    {
        $this->articleService = $articleService;
        $this->notificationPusher = $notificationPusher;
    }

    public function index()
    {
        $breadcrumb = [
            'list' => ['Home', 'Articles'],
            'url' => ['/', '/articles']
        ];

        $articles = $this->articleService->getAllArticles();
        response()->json($articles);
        return view('pages.article.index', compact('articles'));
    }

    public function create()
    {
        return view('pages.article.create');
    }

    public function show(string $id){
        $article = $this->articleService->getArticleById($id);
        if (!$article) {
            return $this->notificationPusher->warning('Article Not Found', ['article' => $article]);
        }
        response()->json($article);
        return view('pages.article.show', ['article' => $article]);
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $article = $this->articleService->createArticle($data);

        // Send success notification
        $this->notificationPusher->success('Article created successfully', ['article' => $article]);
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = $this->articleService->getArticleById($id);
        if (!$article) {
            return redirect()->route('articles.index');
        }

        return response()->view('pages.article.edit', ['article' => $article]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->validated();

        $article = $this->articleService->updateArticle($id, $data);

        return $this->notificationPusher->success('Article updated successfully', ['article' => $article]);
    }

    public function destroy($id)
    {
        $this->articleService->deleteArticle($id);

        $this->notificationPusher->success('Article deleted successfully');
        return redirect()->route('articles.index');
    }
}
