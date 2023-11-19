@extends('components.layout.newmain')

@section('title', 'Create brand')

@section('h1', "Create brand")

@section('menu')
    <ul>
        <li><a href="{{ route('brands.index') }}">All brand</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
    </ul>
@endsection

@section('content')

    <x-form action="{{ route('brands.store') }}" method="post">
        @include('brands.form')
    </x-form>

@endsection