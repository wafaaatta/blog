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
                    <h1>Liste des catégories</h1>
                    <a href="{{ route('categories.create') }}">Créer une nouvelle catégorie</a>

                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('categories.show', $category) }}">{{ $category->name }}{{ $category->image_url }}</a>
                                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold btn btn-danger btn-sm border border-black rounded">Supprimer</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    
