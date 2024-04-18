<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        $title = "Welcome to our Blog";

        return view('blog.blog', compact('title','categories', 'posts'));
    }

    public function showByCategory($id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;

        return view('blog', compact('category', 'posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post', compact('post'));
    }
}

