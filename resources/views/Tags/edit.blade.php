@extends('components.layout.newmain')

@section('title', 'Edit tag')

@section('h1', "Edit Tag")

@section('menu')
    <ul>
        <li><a href="{{ route('brands.index') }}">All brand</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
        <li><a href="{{ route('tags.index') }}">All tags</a></li>
        <li><a href="{{ route('tags.index') }}">All tags</a></li>
        <li><a href="{{ route('tags.create') }}">Create tag</a></li>
    </ul>
@endsection

@section('content')

    <x-form action="{{ route('tags.update', $tag->id) }}" method="put">
        @bind($tag)
            @include('tags.form')
        @endbind
    </x-form>

@endsection