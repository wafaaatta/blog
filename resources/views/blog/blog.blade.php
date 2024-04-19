@include('layouts.front.head')
    <h1>{{ $title }}</h1>
        <div>
            @foreach($posts as $post)
                <div>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <p>{{ $post->description }}</p>
                    <img src="{{ URL::to('/') }}/images/{{ $post->image_url }}" alt="{{ $post->title }}">
                </div>
            @endforeach
        </div>
    
    <main class="mt-6">
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">

        <h1>Blog</h1>

    
        <ul>
            @foreach($categories as $category)
                <li><a href="/blog/categorie/{{ $category->id }}">{{ $category->name }}</a></li>        
            @endforeach
        </ul>


        <ul>
            @foreach($posts as $post)
                <li><a href="/blog/post/{{ $post->id }}">
                    {{ $post->title }}
                    <img src="{{ URL::to('/') }}/images/{{ $post->image_url }}" alt="{{ $post->title }}">

                </a></li>
            @endforeach
        </ul>

    </div>
    </main>
@include('layouts.front.footer')
