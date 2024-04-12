<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;


class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Supprimer les données existantes dans la table pivot
         //\DB::table('categorie_post')->truncate();

         // Récupérer toutes les catégories et tous les posts
         $categories = Category::all();
         $posts = Post::all();
 
         // Attacher chaque post à plusieurs catégories
         foreach ($posts as $post) {
             $post->categories()->attach(
                 $categories->random(rand(1, 3))->pluck('id')->toArray() //pluck est une fonction pratique fournie par Laravel pour extraire une liste de valeurs d'une collection de données.
             );
         }
    }
}
