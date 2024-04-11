<!-- resources/views/categories/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des catégories</h1>

    <ul>
        @foreach($categories as $category)
            <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>

    <a href="{{ route('categories.create') }}">Créer une nouvelle catégorie</a>
@endsection
