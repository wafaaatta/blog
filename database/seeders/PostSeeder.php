<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Insérer des données de test dans la table posts
         
        Post::factory(10)->create();
        DB::table('posts')->insert([

            'title' => 'Premier Post',
            'content' => 'Contenu du premier post...',
            'description' => 'Description du premier post',
            'user_id' => 1,
        ]);


    }
}
