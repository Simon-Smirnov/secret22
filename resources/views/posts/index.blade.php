<h1>Posts</h1>
<hr>
<a href="/posts/create">Create post</a>
<hr>
<div>
    @foreach($posts as $post)
        <p>№{{ $post->id }}</h3>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
    @endforeach
</div>