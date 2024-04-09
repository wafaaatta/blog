<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $title = "welcome";
        $content = "test content";
        $description = "test cdescription";
        $posts = Post::latest()->take(6)->get();// Récupérer les 6 ou 8 derniers posts selon votre choix
        // Pour les 6 derniers posts
        /*$posts = Post::all(); // Récupérer tous les posts de la base de données
        return view('welcome', ['posts' => $posts]); //  je Passe les posts à la vue welcome.blade.php*/

        return view('welcome', [
            'title' => $title,
            'posts' => $posts,
            'description' => $description,
            'content' => $content,

        ]);
    }

    
    public function dashboard()
    {
        return view('dashboard');
    }

    public function myposts()
    {
        // Récupérer les publications de l'utilisateur connecté
        $user = auth()->user(); 
        $posts = $user->posts; // j'ai une relation 'posts' dans ma modèle User

        // Passer les publications à la vue 'myposts.blade.php'
        return view('myposts', ['posts' => $posts]);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }


    
}
