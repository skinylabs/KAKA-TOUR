<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'    => 'Admin',
            'email'    => 'admin@admin.com',
            'role'    => 'admin',
            'password'    => bcrypt('admin123')
        ]);
        User::create([
            'name'    => 'user satu',
            'email'    => 'user1@example.com',
            'role'    => 'user',
            'password'    => bcrypt('user1')
        ]);
        User::create([
            'name'    => 'user dua',
            'email'    => 'user2@example.com',
            'role'    => 'user',
            'password'    => bcrypt('user2')
        ]);
    }
}
