<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\Notifications\NotificationPusher;

class CategoryController extends Controller
{
    private $categoryService;
    private $notificationPusher;

    public function __construct(CategoryService $categoryService, NotificationPusher $notificationPusher)
    {
        $this->categoryService = $categoryService;
        $this->notificationPusher = $notificationPusher;
    }

    public function index()
    {
        $category = $this->categoryService->getAllCategories();
        response()->json($category);
        return view('pages.category.index', compact('category'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();

        $category = $this->categoryService->createCategory($data);

        $this->notificationPusher->success('Category created successfully', ['category' => $category]);
        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return $this->notificationPusher->warning('Category Not Found', ['category' => $category]);
        }
        response()->json($category);
        return view('pages.category.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // $this->categoryService->getCategoryById($id);
        return view('pages.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();

        $category = $this->categoryService->updateCategory($id, $data);

        $this->notificationPusher->success('Category updated successfully', ['category' => $category]);
        return redirect()->route('categories.index');
    }

    public function destroy(string $id)
    {
        $category = $this->categoryService->deleteCategory($id);

        $this->notificationPusher->success('Category deleted successfully', ['category' => $category]);
        return redirect()->route('categories.index');
    }
}