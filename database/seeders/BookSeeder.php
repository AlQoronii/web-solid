<?php

namespace Database\Seeders;

use App\Models\Book;
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
        
        $data = [
            [
                'category_id' => '0d1295c4-e29a-477d-a684-830f888342ea',
                'book_title' => 'To Kill a Mockingbird',
                'book_author' => 'Harper Lee',
                'book_publisher' => 'J.B. Lippincott & Co.',
                'book_year' => 1960,
                'book_image' => 'to_kill_a_mockingbird.jpg',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => '682ffd9e-707e-45c7-a810-718131106d54',
                'book_title' => '1984',
                'book_author' => 'George Orwell',
                'book_publisher' => 'Secker & Warburg',
                'book_year' => 1949,
                'book_image' => '1984.jpg',
                'book_status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => '9a05f81c-fa15-44be-b7d9-6d4c89811b65',
                'book_title' => 'Moby Dick',
                'book_author' => 'Herman Melville',
                'book_publisher' => 'Harper & Brothers',
                'book_year' => 1851,
                'book_image' => 'moby_dick.jpg',
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
