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
                    <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                @if ($post->image_url)
                <img src="{{ asset('images/' . $post->image_url) }}" alt="Post Image">
                @endif
                <a href="{{ route('dashboard.myposts.edit', $post->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('dashboard.myposts.destroy', $post->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post ?')">Supprimer</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



    
