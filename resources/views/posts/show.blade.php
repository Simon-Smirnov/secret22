<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>
<p>№{{ $post->id }}</p>
<small>Data creted: {{ $post->created_at }}</small>
<hr>
<a href="/posts/{{ $post->id }}/edit">Edit post</a>
<hr>
<form method="POST" action="/posts/{{ $post->id }}">
    @csrf
    @method('DELETE')
    <button>Delete post</button>
</form>