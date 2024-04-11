<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
        return view('create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
        ]);
        $request->request->add(['user_id'=>Auth::id()]);


        Post::create($request->all());

        return redirect()->route('dashboard.myposts')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('show', compact('post'));
    }

    public function edit($id)
    {
        
        $post = Post::find($id);

        return view('edit', compact('post'));
    }

    /*public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('dashboard.myposts')
            ->with('success', 'Post updated successfully');
    }*/

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = Post::find($id);
    $post->update($request->all());

    return redirect()->route('dashboard.myposts')
        ->with('success', 'Post updated successfully');
}


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('dashboard.myposts')
            ->with('success', 'Post deleted successfully');
    }
    
}
