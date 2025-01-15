<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function createCategory(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function getCategoryById(string $id): ?Category
    {
        $category = $this->categoryRepository->getById($id);
        if (!$category) {
            throw new \Exception("Category not found");
        }
        return $category;
    }

    public function updateCategory(string $id, array $data): bool
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory(string $id): bool
    {
        return $this->categoryRepository->delete($id);
    }

    public function count()
    {
        return $this->categoryRepository->count();
    }
}