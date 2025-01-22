<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;
use Exception;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function createCategory(array $data): Category
    {
        try {
            return $this->categoryRepository->create($data);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to create category: " . $e->getMessage());
        }
    }

    public function getAllCategories()
    {
        try {
            return $this->categoryRepository->getAll();
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to get all categories: " . $e->getMessage());
        }
    }

    public function getCategoryById(string $id): ?Category
    {
        try {
            $category = $this->categoryRepository->getById($id);
            if (!$category) {
                throw new Exception("Category not found");
            }
            return $category;
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to get category by ID: " . $e->getMessage());
        }
    }

    public function updateCategory(string $id, array $data): bool
    {
        try {
            return $this->categoryRepository->update($id, $data);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to update category: " . $e->getMessage());
        }
    }

    public function deleteCategory(string $id): bool
    {
        try {
            return $this->categoryRepository->delete($id);
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to delete category: " . $e->getMessage());
        }
    }

    public function count()
    {
        try {
            return $this->categoryRepository->count();
        } catch (Exception $e) {
            // Handle exception
            throw new Exception("Failed to count categories: " . $e->getMessage());
        }
    }

    public function getPaginateCategories($perPage, $search = null)
    {
        $query = Category::query();

        if($search) {
            $query->where('category_name', 'like', '%' . $search . '%');
        }

        return $query->paginate($perPage);
    }
}