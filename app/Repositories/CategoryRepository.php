<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    public function getById(string $id): ?Category
    {
        return Category::where('category_id', $id)->first();
    }   

    public function update(string $id, array $data): bool
    {
        $category = Category::where('category_id', $id)->first();
        if ($category) {
            return $category->update($data);
        }
        return false;
    }

    public function delete(string $id): bool
    {
        $category = Category::where('category_id', $id)->first();
        if ($category) {
            return $category->delete();
        }
        return false;
    }

    public function count()
    {
        return Category::count();
    }
}