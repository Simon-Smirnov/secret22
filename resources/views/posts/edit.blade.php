<h1>Edit post №{{ $post->id }}</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @method('PUT')
    @csrf
    <!-- <div>
        <p>Title</p><br>
        <input name="title" value="{{ $errors->any() ? old('title') : $post->title }}">
    </div> -->
    <x-input title="Title" name="title" defaultValue="{{ $post->title }}"/>
    <div>
        <p>Content</p>
        <textarea name="content">{{ $errors->any() ? old('content') : $post->content }}</textarea>
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