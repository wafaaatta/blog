<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <!-- Lien vers votre fichier CSS -->
    
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>


    @include('layouts.front.head')

    <main class="mt-6">
        <h1>{{ $title }}</h1>
    
        <div class="filtrage">
            <div class="categories">
                <ul>
                    @foreach($categories as $category)
                    <li><a href="/blog/categorie/{{ $category->id }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
    
            <div class="posts">
            
                <ul>
                    @foreach($posts as $post)
                    <li>
                        <a href="/blog/post/{{ $post->id }}">
                            {{ $post->title }}
                            <img src="{{ URL::to('/') }}/images/{{ $post->image_url }}" alt="{{ $post->title }}">
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </main>
    
    @include('layouts.front.footer')
    
