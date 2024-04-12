<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /*public function run(): void
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


    }*/
    public function run(): void
    {
        
        Post::factory(10)->create();

        // Sélectionnez un utilisateur existant au hasard
        $user = User::inRandomOrder()->first();

        // Créez un post lié à cet utilisateur
        $user->posts()->create([
            'title' => 'Premier Post',
            'content' => 'Contenu du premier post...',
            'description' => 'Description du premier post',
        ]);
    }
}
