

@extends('layouts.app')

@section('content')
    <h1>Détails de la catégorie "{{ $category->name }}"</h1>

    <p>ID : {{ $category->id }}</p>
    <p>Nom : {{ $category->name }}</p>

    <a href="{{ route('categories.edit', $category) }}">Modifier</a>

    <form method="POST" action="{{ route('categories.destroy', $category) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
@endsection
