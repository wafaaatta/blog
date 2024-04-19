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
                    
                <h1>Modifier le post</h1>
    <form action="{{ route('dashboard.myposts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5">{{ $post->content }}</textarea>
        
            <div class="form-group"> 
                <label for="image_url">Image:</label><br>
                <img src="{{ URL::to('/') }}/images/{{ $post->image_url }}" alt="{{ $post->title }}">
            </div>

        </div>
        <div class="form-group">
    <label>Catégories</label>
    @foreach($categories as $category)
        <div class="form-check">
            <input type="checkbox" name="categories[]" id="category{{ $category->id }}" value="{{ $category->id }}" class="form-check-input" {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
            <label for="category{{ $category->id }}" class="form-check-label">{{ $category->name }}
                @if($category->image_url)
                <img src="{{ URL::to('/') }}/images/{{ $category->image_url }}" alt="{{ $category->title }}">
                @endif
            </label>
        </div>
    @endforeach
</div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
