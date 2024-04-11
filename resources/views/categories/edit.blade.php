<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier la catégorie "{{ $category->name }}"</h1>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <label for="name">Nom de la catégorie:</label><br>
        <input type="text" id="name" name="name" value="{{ $category->name }}"><br><br>
        <button type="submit">Modifier</button>
    </form>
@endsection
