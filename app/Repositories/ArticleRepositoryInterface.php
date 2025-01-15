<?php

// app/Repositories/ArticleRepositoryInterface.php
namespace App\Repositories;

use App\Models\Article;

interface ArticleRepositoryInterface
{
    public function create(array $data): Article;
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
    public function getById(string $id): ?Article;
    public function update(string $id, array $data): bool;
    public function delete(string $id): bool;
    public function getLatestArticles(): \Illuminate\Database\Eloquent\Collection;
    public function count();
}
