<?php

// app/Repositories/ArticleRepository.php
namespace App\Repositories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function create(array $data): Article
    {
        return Article::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Article::all();
    }

    public function getById(string $id): ?Article
    {
        return Article::find($id);
    }

    public function update(string $id, array $data): bool
    {
        $article = $this->getById($id);
        if (!$article) {
            return false;
        }
        
        return $article->update($data);
    }

    public function delete(string $id): bool
    {
        $article = $this->getById($id);
        if (!$article) {
            return false;
        }

        return $article->delete();
    }

    public function getLatestArticles(): Collection
    {
        return Article::latest()->take(5)->get();
    }

    public function count()
    {
        return Article::count();
    }
}
