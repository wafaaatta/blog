@include('layouts.front.head')
    
    <main class="mt-6">
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

        <h1>{{ $post->title }}</h1>

        {{ $post->content }}

        <img src="{{ URL::to('/') }}/images/{{ $post->image_url }}" alt="{{ $post->title }}">
        

    </div>
    </main>
@include('layouts.front.footer')
