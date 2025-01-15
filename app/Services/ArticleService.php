<?php

// app/Services/ArticleService.php
namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;
use App\Models\Article;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function createArticle(array $data): Article
    {
        return $this->articleRepository->create($data);
    }

    public function getAllArticles()
    {
        return $this->articleRepository->getAll();
    }

    public function getArticleById(string $id): ?Article
    {
        return $this->articleRepository->getById($id);
    }

    public function updateArticle(string $id, array $data): bool
    {
        return $this->articleRepository->update($id, $data);
    }

    public function deleteArticle(string $id): bool
    {
        return $this->articleRepository->delete($id);
    }

    public function count()
    {
        return $this->articleRepository->count();
    }
}
