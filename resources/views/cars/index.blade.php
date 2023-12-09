@extends('components.layout.newmain')

@section('title', 'All cars')

@section('h1', 'All cars')

@section('menu')
    @include('components.menu')
@endsection

@section('content')
    @foreach($cars as $car)
        <ul>
            <li class="">
                <em>{{ $car->brand->country->title }}</em>
                <span>{{ $car->brand->title }} {{ $car->model }}</span>
                <a href="{{ route('cars.show', $car->id) }}">Read more...</a>
            </li>
        </ul>
    @endforeach
@endsection

