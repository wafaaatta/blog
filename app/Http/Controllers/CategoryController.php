<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    // Affiche la liste des catégories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Affiche le formulaire de création de catégorie
    public function create()
    {
        return view('categories.create');
    }

    // Enregistre une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,gif|max:5120',
        ]);
        $categoryData = $request->only('name');
    
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
            $categoryData['image_url'] = $imageName;
        }
    
        Category::create($categoryData);
    
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    // Affiche les détails d'une catégorie
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Affiche le formulaire de modification de catégorie
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Met à jour une catégorie
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id.'|max:255',
            'image_url' => 'required|image|mimes:jpeg,png,gif|max:5120',
        ]);

        $categoryData = $request->only('name');
    
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
            $categoryData['image_url'] = $imageName;
        }
    
        $category->update($categoryData);
    
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    // Supprime une catégorie
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}

