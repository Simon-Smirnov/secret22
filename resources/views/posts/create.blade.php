<h1>Create post</h1>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <!-- <div>
        <p>Title</p><br>
        <input name="title" value="{{ old('title') }}">
    </div> -->
    <x-input title="Title" name="title"/>
    <div>
        <p>Content</p>
        <textarea name="content">{{ old('content') }}</textarea>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </div>
    @endif
    <button>Create</button>
</form>