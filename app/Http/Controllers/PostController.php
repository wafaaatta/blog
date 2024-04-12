<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
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
        //return view('myposts', compact('posts', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            
        ]);
        $request->request->add(['user_id'=>Auth::id()]);

        $post = Post::create($request->all());
        $post->categories()->attach($request->category_id);

        return redirect()->route('dashboard.myposts')
            ->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('show', compact('post', 'categories'));
    }

    public function edit($id)
    {  $categories = Category::all();
        
        $post = Post::find($id);

        return view('edit',compact('post', 'categories'));
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
    
    /*public function getPostsByCategoryId($categoryId)
    {
        // Récupérer la catégorie
        $category = Category::findOrFail($categoryId);

        // Récupérer tous les posts associés à cette catégorie
        $posts = $category->posts;

        // Retourner les posts à une vue ou faire ce que vous souhaitez avec eux
        return view('myposts', compact('posts', 'category'));
    }*/
}
