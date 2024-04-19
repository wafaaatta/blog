
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
    <h1>Détails de la catégorie "{{ $category->name }}"</h1>

    <p>ID : {{ $category->id }}</p>
    <p>Nom : {{ $category->name }}</p>
    @if ($category->image_url)
            <img src="{{ URL::to('/') }}/images/{{ $category->image_url }}" alt="{{ $category->title }}">
    @else
        <p>Aucune image disponible</p>
    @endif


    <a href="{{ route('categories.edit', $category) }}">Modifier</a>

    <form method="POST" action="{{ route('categories.destroy', $category) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
    </div>
            </div>
        </div>
    </div>
</x-app-layout>
