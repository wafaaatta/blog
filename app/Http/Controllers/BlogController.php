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
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $posts = $category->posts;
        $title = $category->title;

        return view('blog.blog', compact('title','categories','category', 'posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $title = $post->title;

        return view('blog.single', compact('title','post'));
    }
}

