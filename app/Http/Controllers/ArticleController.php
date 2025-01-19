<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Services\Contracts\FileUploadServiceInterface;
use App\Services\Notifications\NotificationPusher;

class ArticleController extends Controller
{
    protected $articleService;
    protected $notificationPusher;
    protected $fileUploadService;

    public function __construct(ArticleService $articleService, NotificationPusher $notificationPusher, FileUploadServiceInterface $fileUploadService)
    {
        $this->articleService = $articleService;
        $this->notificationPusher = $notificationPusher;
        $this->fileUploadService = $fileUploadService;
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
        $data['article_image'] = $this->fileUploadService->uploadFile($request->file('article_image'), 'articles/images');
        $article = $this->articleService->createArticle($data);

        // Send success notification
        $this->notificationPusher->success('Article created successfully', ['article' => $article]);
        return redirect()->route('articles.index')->with('success', 'Article created successfully');
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
        $article = $this->articleService->getArticleById($id);
        $data = $request->validated();

        if($request->hasFile('article_image')) {
            if(!empty($article->article_image)) {
                $this->fileUploadService->deleteFile('articles/images/' . $article->article_image);
            }
            $data['article_image'] = $this->fileUploadService->uploadFile($request->file('article_image'), 'articles/images');

        }

        $article = $this->articleService->updateArticle($id, $data);

        $this->notificationPusher->success('Article updated successfully', ['article' => $article]);
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $this->articleService->deleteArticle($id);

        $this->notificationPusher->success('Article deleted successfully');
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
}
