<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $categories = [
        'Science Fiction',
        'Fantasy',
        'Mystery',
        'Romance',
        'Horror'
    ];

    foreach ($categories as $category) {
        Category::create([
        'category_name' => $category,
        'created_at' => now(),
        'updated_at' => now()
        ]);
    }
    }
}
