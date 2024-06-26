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
                    
                <h1>Créer un nouveau post</h1>
    <form action="{{ route('dashboard.myposts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Contenu</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group"> 
            <label for="image_url">Image:</label><br>
            <input type="file" name="image_url" id="image_url" class="form-control" rows="5"><br><br>
        </div>

        <div class="form-group" >
            
                        <label for="category">Catégorie</label>
                        <select name="category_id[]" id="category" class="form-control" multiple >
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}
                                    @if($category->image_url)
                                    <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px;">
                                    @endif
                                    </option>
                            @endforeach
                        </select>
                    </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>