<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</button>
    </form>
@endsection
