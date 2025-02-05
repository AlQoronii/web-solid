<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ApiCategories extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }
}