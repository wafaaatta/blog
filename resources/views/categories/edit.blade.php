
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDIT POST') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

    <h1>Modifier la catégorie "{{ $category->name }}"</h1>

    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <label for="name">Nom de la catégorie:</label><br>
        <input type="text" id="name" name="name" value="{{ $category->name }}"><br><br>
        <button type="submit">Modifier</button>
    </form>

    </div>
            </div>
        </div>
    </div>
</x-app-layout>