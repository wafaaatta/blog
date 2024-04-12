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
            Category::create(['name' => 'Catégorie 1']);
            Category::create(['name' => 'Catégorie 2']);
            Category::create(['name' => 'Catégorie 3']);
            
    }
}