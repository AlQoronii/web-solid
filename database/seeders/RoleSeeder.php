<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan admin
        Role::create([
            'name' => 'Admin',
        ]);

        // Tambahkan user biasa
        Role::create([
            'name' => 'User',
        ]);
    }
}

