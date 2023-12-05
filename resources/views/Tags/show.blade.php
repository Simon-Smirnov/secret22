@extends('components.layout.newmain')

@section('title', 'Tag')

@section('h1', "Tag")

@section('menu')
    <ul>
        <li><a href="{{ route('cars.index') }}">All cars</a></li>
        <li><a href="{{ route('cars.create') }}">Add new car</a></li>
        <li><a href="{{ route('cars.trash.index') }}">Car's trash</a></li>
        <li><a href="{{ route('tags.index') }}">All tags</a></li>
        <li><a href="{{ route('tags.create') }}">Create tag</a></li>
    </ul>
@endsection

@section('content')

    <div>
        <div>Brand: {{ $tag->title }}</div>
        <div>Created: {{ $tag->created_at }}</div>
        <div>Cars: 
            <ul>
                @foreach($tag->cars as $car)
                    {{ $car->model }}
                @endforeach
            </ul>    
        </div>
    </div>
    <hr>
    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info">Edit tag</a>
    <hr>
    <x-form method="delete" action="{{ route('tags.destroy', $tag->id) }}">
        <button class="btn btn-danger">Delete tag</button>
    </x-form>
    <div class="mt-4">
        <h5 class="mt-2 mb-0">Add comment</h5>
        <x-form method="POST" action="{{ route('comments.store') }}">
            <x-form-input name="commentable_id" value="{{ $tag->id }}" hidden/>
            <x-form-input name="commentable_type" value="{{ get_class($tag) }}" hidden/>
            <x-form-input class="mt-2 mb-0" name="author"/>
            <x-form-textarea class="mt-2 mb-0" name="content"></x-form-textarea>
            <button class="btn btn-success mt-1 mb-2" class="btn btn-success">Add comment</button>
        </x-form>
    </div>
    @if($tag->comments->isNotEmpty())
        <div class="mt-4">
            <h5 class="mt-2 mb-0">All comments</h5>
            <ul>
                @foreach($tag->comments as $comment)
                    <li class="mt-4">
                        <h6 class="mt-2 mb-0">Author: {{ $comment->author }}</h6>
                        <p class="mt-2 mb-0">Comment: {{ $comment->content }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection