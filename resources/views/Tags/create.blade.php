@extends('components.layout.newmain')

@section('title', 'Create tag')

@section('h1', "Create Tag")

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

    <x-form action="{{ route('tags.store') }}" method="post">
        @include('tags.form')
    </x-form>

@endsection