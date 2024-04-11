<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle catégorie</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <label for="name">Nom de la catégorie:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <button type="submit">Créer</button>
    </form>
@endsection
