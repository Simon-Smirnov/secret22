<h1>Edit post №{{ $post->id }}</h1>
<form action="/posts/{{ $post->id }}" method="POST">
    @method('PUT')
    @csrf
    <div>
        <p>Title</p><br>
        <input name="title" value="{{ old('title') ?? $post->title }}">
    </div>
    <div>
        <p>Content</p>
        <textarea name="content">{{ old('content') ?? $post->content }}</textarea>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </div>
    @endif
    <button>Edit post</button>
</form>