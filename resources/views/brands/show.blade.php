@extends('components.layout.newmain')

@section('title', 'Brand')

@section('h1', "Brand")

@section('menu')
    <ul>
        <li><a href="{{ route('brands.index') }}">All brands</a></li>
        <li><a href="{{ route('brands.create') }}">Add new brand</a></li>
    </ul>
@endsection

@section('content')

    <div>
        <div>Title: {{ $brand->title }}</div>
        <div>Description: {{ $brand->description }}</div>
        <div>Cars:
            <ul>
                @foreach($brand->cars as $car)
                    <li>{{ $car->model }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <a href="{{ route('brands.edit', $brand->id) }}">Edit car</a>
    <hr>
    <x-form method="delete" action="{{ route('brands.destroy', $brand->id) }}">
        <button>Delete car</button>
    </x-form>

@endsection