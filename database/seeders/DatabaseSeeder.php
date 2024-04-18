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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'administrator',
            'password' => bcrypt('test')
        ]);
        User::factory()->create([
            'name' => 'Test1 User',
            'email' => 'test1@example.com',
            'role' => 'user',
            'password' => bcrypt('test')
        ]);
        
    $this->call([
        PostSeeder::class,
        CategorySeeder::class,
        CategoryPostSeeder::class,
    ]);

    }
}
