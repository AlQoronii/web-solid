<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $horror = Category::where('category_name', 'Horror')->first();
        $mystery = Category::where('category_name', 'Mystery')->first();
        $fantasy = Category::where('category_name', 'Fantasy')->first();
        $scienceFiction = Category::where('category_name', 'Science Fiction')->first();
        $romance = Category::where('category_name', 'Romance')->first();
        
        $data = [
            [
                'category_id' => $horror->category_id,
                'book_title' => 'To Kill a Mockingbird',
                'book_author' => 'Harper Lee',
                'book_publisher' => 'J.B. Lippincott & Co.',
                'book_year' => 1960,
                'book_image' => 'image.png',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $mystery->category_id,
                'book_title' => '1984',
                'book_author' => 'George Orwell',
                'book_publisher' => 'Secker & Warburg',
                'book_year' => 1949,
                'book_image' => 'image.png',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $fantasy->category_id,
                'book_title' => 'Moby Dick',
                'book_author' => 'Herman Melville',
                'book_publisher' => 'Harper & Brothers',
                'book_year' => 1851,
                'book_image' => 'image.png',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $scienceFiction->category_id,
                'book_title' => 'Dune',
                'book_author' => 'Frank Herbert',
                'book_publisher' => 'Chilton Books',
                'book_year' => 1965,
                'book_image' => 'image.png',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $romance->category_id,
                'book_title' => 'Pride and Prejudice',
                'book_author' => 'Jane Austen',
                'book_publisher' => 'T. Egerton',
                'book_year' => 1813,
                'book_image' => 'image.png',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $book){
            Book::create($book);
        }
    }
}
