<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
            // Supprimer les éventuelles données existantes dans la table
            Category::truncate();

             // Insérer des données
        Category::create(['name' => 'Culture de jeux', 'image_url' => 'sample_image.jpg']);
        Category::create(['name' => 'Guides', 'image_url' => 'sample_image_2.jpg']);
        Category::create(['name' => 'Actualités jeux', 'image_url' => 'sample_image_3.jpg']);
    }
    }
