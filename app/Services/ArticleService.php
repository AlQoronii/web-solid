<?php

// app/Services/ArticleService.php
namespace App\Services;

use App\Repositories\ArticleRepositoryInterface;
use App\Models\Article;
use Exception;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function createArticle(array $data): Article
    {
        try {
            return $this->articleRepository->create($data);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error creating article: " . $e->getMessage());
        }
    }

    public function getAllArticles()
    {
        try {
            return $this->articleRepository->getAll();
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error fetching all articles: " . $e->getMessage());
        }
    }

    public function getArticleById(string $id): ?Article
    {
        try {
            return $this->articleRepository->getById($id);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error fetching article by ID: " . $e->getMessage());
        }
    }

    public function updateArticle(string $id, array $data): bool
    {
        try {
            return $this->articleRepository->update($id, $data);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error updating article: " . $e->getMessage());
        }
    }

    public function deleteArticle(string $id): bool
    {
        try {
            return $this->articleRepository->delete($id);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error deleting article: " . $e->getMessage());
        }
    }

    public function count()
    {
        try {
            return $this->articleRepository->count();
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Error counting articles: " . $e->getMessage());
        }
    }

    public function getPaginatedArticles($perPage, $search = null)
    {
        $query = Article::query();

        if ($search) {
            $query->where('article_title', 'like', '%' . $search . '%')
                  ->orWhere('article_content', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage);
    }
}
