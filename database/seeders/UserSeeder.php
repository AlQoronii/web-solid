<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roleUser = Role::where('name', 'user')->first();
        $roleAdmin = Role::where('name', 'admin')->first();
        User::create([
            'username' => 'Admin',
            'email' => 'admin@example.com',
            'role_id' => $roleAdmin->role_id, // Admin
            'password' => bcrypt('password'), // Password default
        ]);
    }
}

