<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // tambahkan 10 seeder loan
        for ($i = 1; $i <= 10; $i++) {
            DB::table('loans')->insert([
                'user_id' => $i,
                'book_id' => $i,
                'loan_date' => now(),
                'return_date' => now()->addDays(7),
                'status' => 'unreturned',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
