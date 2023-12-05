@extends('components.layout.newmain')

@section('title', 'Car')

@section('h1', "Car")

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
        <div>Brand: {{ $car->brand->title }}</div>
        <div>Model: {{ $car->model }}</div>
        <div>Price: {{ $car->price }}</div>
        <div>Transmission: {{ $car->transmission }}</div>
        <div>VIN: {{ $car->vin }}</div>
        <div>Tags:  
            <ul>
                @foreach($car->tags as $tag)
                    <li>{{ $tag->title }}</li> 
                @endforeach
            </ul>
        </div>
        <div>Status: {{ $car->status->toString() }}</div>
    <hr>
    <a href="{{ route('cars.edit', $car->id) }}">Edit car</a>
    <hr>
    @if($car->deletable)
        <form method="POST" action="{{ route('cars.destroy', $car->id) }}">
            @method('DELETE')
            @csrf
            <button>Delete car</button>
        <form>
    @endif
    <div class="mt-4">
        <h5 class="mt-2 mb-0">Add comment</h5>
        <x-form method="POST" action="{{ route('comments.store') }}">
            <x-form-input name="commentable_id" value="{{ $car->id }}" hidden/>
            <x-form-input name="commentable_type" value="{{ get_class($car) }}" hidden/>
            <x-form-input class="mt-2 mb-0" name="author"/>
            <x-form-textarea class="mt-2 mb-0" name="content"></x-form-textarea>
            <button class="btn btn-success mt-1 mb-2" class="btn btn-success">Add comment</button>
        </x-form>
    </div>
    @if($car->comments->isNotEmpty())
        <div class="mt-4">
            <h5 class="mt-2 mb-0">All comments</h5>
            <ul>
                @foreach($car->comments as $comment)
                    <li class="mt-4">
                        <h6 class="mt-2 mb-0">Author: {{ $comment->author }}</h6>
                        <p class="mt-2 mb-0">Comment: {{ $comment->content }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection