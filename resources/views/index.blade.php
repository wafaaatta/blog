@extends('layouts.app')

@section('content')
    <h1>Liste des Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Créer un nouveau post</a>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
