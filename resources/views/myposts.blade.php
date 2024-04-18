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
                    <a href="{{ route('dashboard.myposts.create') }}" class="btn btn-primary">Créer un nouveau post</a> 
                @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">Catégorie : </p>
                    @foreach($post->categories as $category)
                                <span> {{ $category->name }}</span>
                            @endforeach    
                            @if($post->image_url)
                    <img src="{{ asset('storage/images/'.$post->image_url) }}" alt="Post Image">
                    @endif
                    <a href="{{route('dashboard.myposts.edit',$post->id)}}">Edit</a>
                    <a href="{{ route('dashboard.myposts.show', $post->id) }}">{{ $post->title }}</a>
                    <form action="{{ route('dashboard.myposts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="font-bold btn btn-danger btn-sm border border-black rounded">Supprimer</button>
                    </form>
                    <p class="card-text">{{ $post->user->name }}</p>
                </div>
            </div>
        @endforeach
        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
