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
    <a href="{{ route('tags.edit', $tag->id) }}">Edit tag</a>
    <hr>
    <x-form method="delete" action="{{ route('tags.destroy', $tag->id) }}">
        <button>Delete tag</button>
    </x-form>

@endsection