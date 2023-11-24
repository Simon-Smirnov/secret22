@extends('components.layout.newmain')

@section('title', 'All tags')

@section('h1', 'All tags')

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
    @foreach($tags as $tag)
        <ul>
            <li class="">
                <span>{{ $tag->title }}</span>
                <a href="{{ route('tags.show', $tag->id) }}">Read more...</a>
            </li>
        </ul>
    @endforeach
@endsection

