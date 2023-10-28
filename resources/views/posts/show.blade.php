<x-layout.main title="Post №{{ $post->id }}" h1="Post №{{ $post->id }}">
    <p>{{ $post->content }}</p>
    <p>№{{ $post->id }}</p>
    <small>Data creted: {{ $post->created_at }}</small>
    <hr>
    <a href="{{ route('posts.edit', $post->id) }}">Edit post</a>
    <hr>
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('DELETE')
        <button>Delete post</button>
    </form>
</x-layout.main>