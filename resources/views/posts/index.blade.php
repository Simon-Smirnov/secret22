<x-layout.main title="All posts" h1="All posts">
    <a href="{{ route('posts.create') }}">Create post</a>
    <hr>
    <div>
        @foreach($posts as $post)
            <p>№{{ $post->id }}</h3>
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->content }}</p>
            <a href="{{ route('posts.show', $post->id) }}">more details</a>
            @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}">edit post</a>
            @endif
        @endforeach
    </div>
</x-layout.main>
    
