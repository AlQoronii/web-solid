<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;

class ApiCategories extends Controller
{

    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {   
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories(); // Pastikan relasi dimuat
        return response()->json($categories);
    }

    public function show($id){
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }
}